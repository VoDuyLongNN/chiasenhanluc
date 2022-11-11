$(document).ready(function() {
    getCity();
    getFields();

    var page = 0;
    getArticleCompany();
    PaginationCompany();

    getArticlePersonally();
    PaginationPersonally();

    $('.Register--Roles').click(function() {
        getCity();
        getFields();

        $('.Register-Card').fadeOut(600);
        $('.Register-Infor').fadeIn(700);

        let roles = $(this).attr('data-roles');

        if (roles == "Personally") {
            changeRegister('Register-Infor__Introduce', 'Register-Infor__Gender');
            changeRegister('Register-Infor__Introduce', 'Register-Infor__Address--Fields');
        } else {
            changeRegister('Register-Infor__Address--Fields', 'Register-Infor__Introduce');
            changeRegister('Register-Infor__Gender', 'Register-Infor__Introduce');
        }

        /* --------------------------------------------- Load API City-District-Commune ---------------------------------------------*/

        $('.Register-Infor__Address--City').click(function() {
            let IDTP = $(this).val().split('-')[0];

            $.post('./User/getDistrict', { IDTP: IDTP }, function(data) {

                let obj = JSON.parse(data);
                let districtHTML = '';

                obj.forEach(element => {
                    districtHTML += "<option value='" + element.maqh+ " - " +element.name + "'>" + element.name + "</option>"
                });
                $('.Register-Infor__District').html(districtHTML);

                $('.Register-Infor__District').click(function() {
                    let IDQH = $(this).val().split('-')[0];

                    $.post('./User/getCommune', { IDQH: IDQH }, function(data) {

                        let obj = JSON.parse(data);
                        let communeTownHTML = '';

                        obj.forEach(element => {
                            communeTownHTML += "<option value='" + element.xaid + " - " + element.name + "'>" + element.name + "</option>"
                        });
                        $('.Register-Infor__CommuneTown').html(communeTownHTML);
                    })
                })
            })
        })

        /* --------------------------------------------- Register ---------------------------------------------*/
        $('.Register--Design').click(function() {
            let Email = $('.Register-Email').val();
            let Password = $('.Register-Password').val();
            let Name = $('.Register-Name').val();
            let Phone = $('.Register-Phone').val();
            let City = $('.Register-Infor__Address--City').val();
            let District = $('.Register-Infor__District').val();
            let Commune = $('.Register-Infor__CommuneTown').val();
            let birthDay = $('.Register-BirthDay').val();

            let Address = '';

            if (Commune != null && District != null) {
                Address = $('.Register-Address').val() + " -" + District.split('-')[1] + " -" + Commune.split('-')[1];
            }

            let Fields = $('.Register-Infor__Address--Fields').val();
            let Gender = $("input[name='rdGender']:checked").val();
            let Introduce = $('.Register--Introduce').val();

            $.post('./User/registerUser', { roles: roles, Email: Email, Password: Password, Name: Name, birthDay:birthDay, Phone: Phone, City: City.split('-')[1], Address: Address, Fields: Fields, Gender: Gender, Introduce: Introduce }, function(data) {
                if (data == 1) {
                    $(location).attr('href', 'Login');
                } else {
                    $('.Register--Error').html(data);
                }
            });
        })
    });

    $('.Login-Card__Action--Register').click(function() {
        $(location).attr('href', 'Register');
    });
    /* --------------------------------------------- Update Infor User ---------------------------------------------*/
    $('.Infor-Contain__Changed--Action').click(function(){
        let Name = $('.Infor-Contain__Changed--Name').val();
        let birthDay = $('.Infor-Contain__Changed--BirthDay').val();
        let Phone = $('.Infor-Contain__Changed--Phone').val();
        let City = $('.Changed--City').val();
        let Address = $('.Infor-Contain__Changed--Address').val();
        let Introduce = $('.Register--Introduce').val();
        let Fields = $('.Changed--Fields').val();
        let Gender = $("Input[name='rdGender']:checked").val();

        $.post('./InforUser/updateInforUser', {Name:Name,birthDay:birthDay, Phone:Phone, City:City, Address:Address, Introduce:Introduce, Fields:Fields, Gender:Gender}, function(data){
            console.log(data);
        })
    })

    /* --------------------------------------------- LogOut ---------------------------------------------*/

    $('.user-menu__list-item-logout').click(function() {
            $.post('./User/logOut');
            $(location).attr("href", "Home");
        })
        /* --------------------------------------------- Login ---------------------------------------------*/

    $('.Action__toPageLogin').click(function() {
        $(location).attr('href', 'Login');
    })

    $('.Login-Card__Action--Login').click(function() {
        login();
    });

    function login() {
        let email = $('.Login-Card__Content--Email').val();
        let password = $('.Login-Card__Content--Password').val();

        $.post('./User/checkLogin', { email: email, password: password }, function(data) {
            if (data == 1) {
                $(location).attr('href', 'Home');
            } else {
                $('.Register--Error').html(data);
            }
        });
    }

    /* --------------------------------------------- Post Article  ---------------------------------------------*/

    $('.header__catelory-user-posting--Company').click(function() {
        $(location).attr('href', 'PostArticleCompany');
    })

    $('.header__catelory-user-posting--Personally').click(function() {
            $(location).attr('href', 'PostArticlePersonally');
        })
        /* --------------------------------------------- Forgot Passwords ---------------------------------------------*/

    changedCapcha();

    $('.changed-code').click(function(data) {
        changedCapcha();
    });

    $('.Action--Forgot').click(function(data) {
        let email = $('.recovery--Email').val();
        let capchaNew = $('.Code').val();
        let confirmCapcha = $('.Verification-Code').val();

        if (confirmCapcha === capchaNew) {
            $.post('./ForgotPassword/recovery', { email: email }, function(data) {
                $('.Register--Error').html(data);
            })
        } else {
            changedCapcha();
            $('.Register--Error').html('Mã xác nhận không chính xác');
        }
    });

    /* --------------------------------------------- Changed Fiels Post Article---------------------------------------------*/

    $('.form__body-group--Changed-Fields').click(function(){
        changeFields('form__body-group--CancelChange-Fields','form__body-group--Changed-Fields');
        changeFields('post__Personally--Fields','form__body-group--Changed-Fields');

        document.querySelector('.post__Personally--Fields').classList.add('post__Company--Fields');
    })

    $('.form__body-group--CancelChange-Fields').click(function(){
        changeFields('form__body-group--Changed-Fields','form__body-group--CancelChange-Fields');
        changeFields('form__body-group--Changed-Fields','post__Personally--Fields');

        document.querySelector('.post__Personally--Fields').classList.remove('post__Company--Fields');
    })

    /* --------------------------------------------- Post Article Personally---------------------------------------------*/
    $('.postArticle__Personally').click(function() {

            var IDFields = $('.form__body-group-1-input--Fields').attr('data-idfield');

            if(document.querySelector('.post__Company--Fields'))
            {
                IDFields = $('.post__Company--Fields').val();
            }

            var Position = $('.form__body-group-1-input--Position').val();
            var Title = $('.form__body-group-1-input--Title').val();
            var Description = $('.form__body-group-1-input--Description').val();
            var Experience = $('.form__body-group-1-input--experience').val();
            var dateEnd = $('.form__body-group-1-input--dateEnd').val();
            var timeWork = $('.post__Company--timeWork').val();

            $.post('./Personally/addArticleAPersonally', { IDFields: IDFields, Position: Position, Title: Title, timeWork: timeWork, Description: Description, Experience: Experience, dateEnd: dateEnd }, function(data) {
                var notifyCreate = `<div class="Notifycation-Contain">
                                        <div class="Notifycation__Contain">
                                            <div class="Notifycation__Contain--Left">
                                                <i class="Notifycation__Icon fa-regular fa-circle-check"></i>
                                            </div>
                                            <div class="Notifycation__Contain--Right">
                                                <h5>Thông báo</h5>
                                                <p class="Notifycation__Content"></p>
                                            </div>
                                        </div>
                                    </div>`;
                $('.Notifycation-Post').html(notifyCreate);

                var notifycation = document.querySelector('.Notifycation-Contain');
                var notifycationIcon = document.querySelector('.Notifycation__Icon');

                if (data == 0) {
                    notifycation.classList.add('Notifycation--Error');
                    notifycationIcon.classList.add('Notifycation__Icon--Error');
                    $('.Notifycation__Content').html("Đăng bài thất bại. Vui lòng điền đầy đủ thông tin!");
                } else {
                    notifycation.classList.add('Notifycation--Success');
                    notifycationIcon.classList.add('Notifycation__Icon--Success');
                    $('.Notifycation__Content').html("Đăng bài thành công");
                }
            });
        })
        /* --------------------------------------------- Post Article Company---------------------------------------------*/

    $('.postArticle__Company').click(function() {
        var IDFields = $('.post__Company--Fields').val();
        var Position = $('.form__body-group-1-input--Position').val();
        var Title = $('.form__body-group-1-input--Title').val();
        var Description = $('.form__body-group-1-input--Description').val();
        var Requirement = $('.form__body-group-1-input--Requirement').val();
        var amountRecruitment = $('.form__body-group-1-input--amountRecruitment').val();
        var Experience = $('.form__body-group-1-input--experience').val();
        var timeWork = $('.post__Company--timeWork').val();
        var dateEnd = $('.form__body-group-1-input--dateEnd').val();
        var fromSalary = $('.form__body-group-1-input--fromSalary').val();
        var toSalary = $('.form__body-group-1-input--toSalary').val();

        $.post('./Company/addArticleCompany', { IDFields: IDFields, Position: Position, Title: Title, Description: Description, Requirement: Requirement, amountRecruitment: amountRecruitment, Experience: Experience, timeWork: timeWork, dateEnd: dateEnd, fromSalary: fromSalary, toSalary: toSalary }, function(data) {

            var notifyCreate = `<div class="Notifycation-Contain">
                                    <div class="Notifycation__Contain">
                                        <div class="Notifycation__Contain--Left">
                                            <i class="Notifycation__Icon fa-regular fa-circle-check"></i>
                                        </div>
                                        <div class="Notifycation__Contain--Right">
                                            <h5>Thông báo</h5>
                                            <p class="Notifycation__Content"></p>
                                        </div>
                                    </div>
                                </div>`;
            $('.Notifycation-Post').html(notifyCreate);

            var notifycation = document.querySelector('.Notifycation-Contain');
            var notifycationIcon = document.querySelector('.Notifycation__Icon');

            if (data == 0) {
                notifycation.classList.add('Notifycation--Error');
                notifycationIcon.classList.add('Notifycation__Icon--Error');
                $('.Notifycation__Content').html("Đăng bài thất bại. Vui lòng xem lại thông tin");
            } else {
                notifycation.classList.add('Notifycation--Success');
                notifycationIcon.classList.add('Notifycation__Icon--Success');
                $('.Notifycation__Content').html("Đăng bài thành công");
            }

        })
    })

    /* --------------------------------------------- Load Article Personally---------------------------------------------*/
    function getArticlePersonally() {
        var experience = getValue('cbExperience');
        var city = getValue('cbCity');
        var timeWork = getValue('cbtimeWork');
        var fields = $('.category-droplist__Fields').val();
        var countProduct = 4;

        $.post('./Personally/getArticlePersonally', { experience: experience, fields: fields, city: city, timeWork: timeWork, countProduct: countProduct, page: page }, function(data) {
            var obj = JSON.parse(data);

            var articlePersonallyHTML = '';

            obj.forEach(element => {
                articlePersonallyHTML +=
                    "<li class='list__individual-item list__individual-item--Personally'>" +
                    "<div class='list__individual-item-top'>" +
                    "<div class='list__individual-item-avt'>" +
                    "<img src='" + element.image + "' alt=''>" +
                    "</div>" +
                    "<div class='list__individual-item-info'>" +
                    "<p class='list__individual-item-info-text list__individual-item-info-title'>" + element.title + "</p>" +
                    "<p class='list__individual-item-info-text'>Lĩnh Vực: <span>" + element.nameField + "</span></p>" +
                    "<p class='list__individual-item-info-text'>Kinh nghiệm: <span>" + element.experience + "</span></p>" +
                    "<p class='list__individual-item-info-text'>Thời gian làm việc: <span class='list__individual-item-info-quantity'>" + element.timeWork + "</span></p>" +
                    "</div>" +
                    "<div class='list__individual-item-icon list__individual-item--ArticlePersonally'>" +
                    "<p class='list__individual-item-info-text list__individual-item-info-dir'><i class='fa-solid fa-location-dot'></i><span class=''>" + element.city + "</span></p>" +
                    "<p class='list__individual-item-status-time'><i class='list__individual-item-icon fa-solid fa-calendar-days'></i>" +
                    "<span class='list__individual-item-status-time-start'>" + formatDate(element.datePost) + "</span>-<span class='list__individual-item-status-time-end'>" + formatDate(element.dateEnd) + "</span></p>" +
                    "<a href='DetailsPostPersonally?id=" + element.ID + "' target='_blank' class='list__individua-link list__Personally'>" +
                    "<button class='list__individual-item-button list__individual-item-detail list__individual-item-detail--Personally'>Chi tiết</button>" +
                    "</a>" +
                    "</div>" +
                    "</div>" +
                    "<div class='list__individual-item-bottom'>" +
                    "<p class='list__individual-item-desc'>" + element.description + "</p>" +
                    "</div>" +
                    "</li>";
            })
            $('.list__individual--articlePersonally').html(articlePersonallyHTML);
            // const listIconSave = document.querySelectorAll('.list__individual-item-personal-icon');
            // listIconSave.forEach((item) =>{
            //     item.addEventListener("click", function(event) {
            //         event.target.classList.toggle('saved');
            //     })
            // })
        });
    }

    /* --------------------------------------------- Load Article Company---------------------------------------------*/
    function getArticleCompany() {
        var experience = getValue('cbExperience');
        var city = getValue('cbCity');
        var timeWork = getValue('cbtimeWork');
        var fields = $('.category-droplist__Fields').val();
        var countProduct = 4;

        $.post('./Company/getArticleCompany', { experience: experience, fields: fields, city: city, timeWork: timeWork, countProduct: countProduct, page: page }, function(data) {
            var obj = JSON.parse(data);

            var articleCompanyHTML = '';

            obj.forEach(element => {
                articleCompanyHTML += "<li class='list__individual-item'>" +
                    "<div class='list__individual-item__save'>" +
                        "<i data-id='"+element.ID+"' class='fa-solid fa-bookmark unsaved'></i>" +
                    "</div>" +
                    "<div class='list__individual-item-status'>" +
                    "<div class='list__individual-item__Status'>";
                if (Number(element.amountRecruitment) >= Number(element.amountRecruitmented)) {
                    articleCompanyHTML += "<button class='list__individual-item-status-button status__Date--Close'>Dừng tuyển</button>";
                } else {
                    articleCompanyHTML += "<button class='list__individual-item-status-button status__Date--Open'>Còn tuyển</button>";
                }

                articleCompanyHTML += "</div>" +
                    "<div class='list__individual-item__Date'>" +
                    "<p class='list__individual-item-status-location'><i class='list__individual-item-icon fa-solid fa-location-dot'></i>" +
                    "<span class=''>" + element.city + "</span></p>" +
                    "<p class='list__individual-item-status-time'><i class='list__individual-item-icon fa-solid fa-calendar-days'></i>" +
                    "<span class='list__individual-item-status-time-start'>" + formatDate(element.datePost) + "</span>-<span class='list__individual-item-status-time-end'>" + formatDate(element.dateEnd) + "</span></p>" +
                    "</div>" +
                    "</div>" +

                    "<div class='list__individual-item-top'>" +
                    "<div class='list__individual-item-avt'>" +
                    "<img src='" + element.image + "' alt=''>" +
                    "</div>" +
                    "<div class='list__individual-item-info'>" +
                    "<p class='list__individual-item-info-text list__individual-item-info-title'>" + element.title + "</p>" +
                    "<p class='list__individual-item-info-text'>Công ty: <span class='list__individual-item-info-company'>" + element.name + "</span></p>" +
                    "<p class='list__individual-item-info-text'>Vị Trí: <span class='list__individual-item-info-position'>" + element.position + "</span></p>" +
                    "<p class='list__individual-item-info-text'>Hình thức: <span class='list__individual-item-info-position'>" + element.timeWork + "</span></p>" +
                    "<p class='list__individual-item-info-text'>Mức Lương: <span class='list__individual-item-info-salary'>" + changedPrice(Number(element.fromSalary)) + " - " + changedPrice(Number(element.toSalary)) + "</span></p>" +
                    "</div>" +
                    "<a href='DetailsPostCompany?id=" + element.ID + "' target='_blank' class='list__individua-link'>" +
                    "<div class='list__individual-item-icon'>" +
                    "<button class='list__individual-item-button'>Chi tiết</button>" +
                    "</div>" +
                    "</a>" +
                    "</div>" +
                    "<div class='list__individual-item-bottom'>" +
                    "<p class='list__individual-item-desc'>" + element.description + "</p>" +
                    "</div>" +
                    "<div class='list__individual-item-quantity'>" +
                    "<p class='list__individual-recruitment-quantity'>Tình trạng: " +
                    "<span class='list__individual-item-amountRecruitment'>" + element.amountRecruitment + "</span>/" +
                    "<span class='list__individual-item-amountRecruitmented'>" + element.amountRecruitmented + "</span>";

                if (Number(element.amountRecruitment) < Number(element.amountRecruitmented)) {
                    articleCompanyHTML += "<i class='fa-solid fa-circle status__Recruitment--Open'></i>";
                } else {
                    articleCompanyHTML += "<i class='fa-solid fa-circle status__Recruitment--Close'></i>";
                }

                articleCompanyHTML += "</p>" +
                    "</div>" +
                    "</li>";
            });

            $('.list__individual--ArticleCompany').html(articleCompanyHTML);
            // const listIconSave = document.querySelectorAll('.unsaved');
            // listIconSave.forEach((item) => {
            //     item.addEventListener("click", function(event) {
            //         event.target.classList.toggle('saved');
            //     })
            // })

            $('.unsaved').click(function(){
                let IDArticle = $(this).attr('data-id');

                if($(this).hasClass('unsaved'))
                {
                    $.post("./Personally/saveArticle", {IDArticle:IDArticle}, function(data){
                        if(data == 0)
                        {
                            $(location).attr('href', 'Login');
                        }
                    })

                    $(this).removeClass('unsaved').addClass('saved');
                }
                else
                {
                    if($(this).hasClass('saved'))
                    {
                        $.post("./Personally/unsetArticle", {IDArticle:IDArticle}, function(data){
                            if(data == 0)
                            {
                                $(location).attr('href', 'Login');
                            }
                        })
                        $(this).removeClass('saved').addClass('unsaved');
                    }
                }
            })  
        });
    }

    /* -------------------------------------- Phân trang --------------------------------------  */
    function PaginationPersonally() {
        var experience = getValue('cbExperience');
        var timeWork = getValue('cbtimeWork');
        var city = getValue('cbCity');
        var fields = $('.category-droplist__Fields').val();
        var countProduct = 4;

        $.ajax({
            url: "./Personally/getPagesArticlePersonally",
            type: "POST",
            data: { experience: experience, city: city, fields: fields, timeWork: timeWork, countProduct: countProduct },
            success: function(data) {
                var value = data;

                if (document.querySelector('.MainProduct__Pagination--Personally')) {
                    if (page > 0) {
                        var firstPage = document.createElement("div");
                        firstPage.className = "controlPage firstPage-Peronsally";
                        firstPage.innerHTML = "First";
                        document.querySelector('.MainProduct__Pagination--Personally').appendChild(firstPage);

                        var prePage = document.createElement("div");
                        prePage.className = "controlPage prePage-Peronsally";
                        prePage.innerHTML = "Previous";
                        document.querySelector('.MainProduct__Pagination--Personally').appendChild(prePage);
                    }

                    for (var i = 0; i < value; i++) {
                        if (i == page) {
                            var temp = document.createElement("div");
                            temp.className = "Pagination";
                            temp.innerHTML = i;
                            temp.style.background = "var(--main-color)";
                            temp.style.color = "#fff";
                        } else {
                            if (i <= 2) {
                                var temp = document.createElement("div");
                                temp.className = "Pagination";
                                temp.innerHTML = i;
                            }
                        }
                        document.querySelector('.MainProduct__Pagination--Personally').appendChild(temp);
                    }

                    if (page >= 0 && page < value - 1) {
                        var nextPage = document.createElement("div");
                        nextPage.className = "controlPage nextPage-Peronsally";
                        nextPage.innerHTML = "Next";
                        document.querySelector('.MainProduct__Pagination--Personally').appendChild(nextPage);

                        var lastPage = document.createElement("div");
                        lastPage.className = "controlPage lastPage-Peronsally";
                        lastPage.innerHTML = "Last";
                        document.querySelector('.MainProduct__Pagination--Personally').appendChild(lastPage);
                    }
                }

                //select Page
                $('.Pagination').click(function() {
                    page = $(this).text();
                    userControlPage_Personally();
                })

                //Previous Page
                $('.prePage-Peronsally').click(function() {
                    if (page > 0) {
                        page--;
                    }
                    userControlPage_Personally();
                })

                //First Page
                $('.firstPage-Peronsally').click(function() {
                    page = 0;
                    userControlPage_Personally();
                })

                //nextPage
                $('.nextPage-Peronsally').click(function() {
                    if (page < value - 1) {
                        page++;
                    }
                    userControlPage_Personally();
                })

                //lastPage
                $('.lastPage-Peronsally').click(function() {
                    page = parseInt(value);

                    if (value % 2 == 0)
                        page = value - 1;

                    userControlPage_Personally();
                })
            }
        })
    }

    function PaginationCompany() {
        var experience = getValue('cbExperience');
        var timeWork = getValue('cbtimeWork');
        var city = getValue('cbCity');
        var fields = $('.category-droplist__Fields').val();
        var countProduct = 4;

        $.ajax({
            url: "./Company/getPagesArticleCompany",
            type: "POST",
            data: { experience: experience, city: city, fields: fields, timeWork: timeWork, countProduct: countProduct },
            success: function(data) {
                var value = data;

                if (document.querySelector('.MainProduct__Pagination--Company')) {
                    if (page > 0) {
                        var firstPage = document.createElement("div");
                        firstPage.className = "controlPage firstPage-Company";
                        firstPage.innerHTML = "First";
                        document.querySelector('.MainProduct__Pagination--Company').appendChild(firstPage);

                        var prePage = document.createElement("div");
                        prePage.className = "controlPage prePage-Company";
                        prePage.innerHTML = "Previous";
                        document.querySelector('.MainProduct__Pagination--Company').appendChild(prePage);
                    }

                    for (var i = 0; i < value; i++) {
                        if (i == page) {
                            var temp = document.createElement("div");
                            temp.className = "Pagination";
                            temp.innerHTML = i;
                            temp.style.background = "var(--main-color)";
                            temp.style.color = "#fff";
                        } else {
                            if (i <= 2) {
                                var temp = document.createElement("div");
                                temp.className = "Pagination";
                                temp.innerHTML = i;
                            }
                        }
                        document.querySelector('.MainProduct__Pagination--Company').appendChild(temp);
                    }

                    if (page >= 0 && page < value - 1) {
                        var nextPage = document.createElement("div");
                        nextPage.className = "controlPage nextPage-Company";
                        nextPage.innerHTML = "Next";
                        document.querySelector('.MainProduct__Pagination--Company').appendChild(nextPage);

                        var lastPage = document.createElement("div");
                        lastPage.className = "controlPage lastPage-Company";
                        lastPage.innerHTML = "Last";
                        document.querySelector('.MainProduct__Pagination--Company').appendChild(lastPage);
                    }
                }

                //select Page
                $('.Pagination').click(function() {
                    page = $(this).text();
                    userControlPage();
                })

                //Previous Page
                $('.prePage-Company').click(function() {
                    if (page > 0) {
                        page--;
                    }
                    userControlPage();
                })

                //First Page
                $('.firstPage-Company').click(function() {
                    page = 0;
                    userControlPage();
                })

                //nextPage
                $('.nextPage-Company').click(function() {
                    if (page < value - 1) {
                        page++;
                    }
                    userControlPage();
                })

                //lastPage
                $('.lastPage-Company').click(function() {
                    page = parseInt(value);

                    if (value % 2 == 0)
                        page = value - 1;

                    userControlPage();
                })
            }
        })
    }

    function userControlPage() {
        removePages();
        removeControlPage();
        getArticleCompany();
        PaginationCompany();
    }

    function userControlPage_Personally() {
        removePages();
        removeControlPage();
        getArticlePersonally();
        PaginationPersonally();
    }
    /* -------------------------------------- Xóa phân trang--------------------------------------  */

    function removePages() {
        $('.Pagination').remove();
    }

    function removeControlPage() {
        $('.controlPage').remove();
    }
    /* -------------------------------------- Manager Article Posted Personally--------------------------------------  */
    
    $('.Manager-Post__Contain-SelectionSort').change(function(){
        console.log($(this).val());
        managerArticlePostedPersonally();
    })
    managerArticlePostedPersonally();

    function managerArticlePostedPersonally()
    {
        var selectionSort = $('.Manager-Post__Contain-SelectionSort').val();

        $.post('./ManagerPostPersonally/getArticlePosted',{selectionSort:selectionSort}, function(data){
            var obj = JSON.parse(data);

            let postedArticleHTML = '';
            var index = 0;

            obj.forEach(element => {
                postedArticleHTML += "<div class='Manager-Post__Contain--Item'>"+
                                        "<div class='Histories-Interested__Contain--Image'>"+
                                            "<img src='"+element.image+"' alt=''>"+
                                        "</div>"+
                                        "<div class='Histories-Interested__Contain--Content'>"+
                                        "<h3 class='Histories-Interested__Contain--Title'>"+element.title+"</h3>"+
                                            "<p class='Histories-Interested__Contain--Description'>"+element.description+"</p>"+
                                        "</div>"+
                                        "<div class='Histories-Interested__Contain--Status'>";
                                            if(element.statusPost == 1)
                                            {
                                                postedArticleHTML += "<p class='Histories-Interested__Contain--Status-Post status-Post--Opened'>Còn hạn</p>";
                                            }
                                            else if(element.statusPost == 0)
                                            {
                                                postedArticleHTML += "<p class='Histories-Interested__Contain--Status-Post status-Post--Closed'>Hết hạn</p>";
                                            }
                                            else if(element.statusPost == 2)
                                            {
                                                postedArticleHTML += "<p class='Histories-Interested__Contain--Status-Post status-Post--Approving'>Đang duyệt</p>";
                                            }
                postedArticleHTML += "</div>"+
                                        "<div class='Histories-Interested__Contain--Selection'>"+
                                            "<button data-idarticle='"+element.ID+"' class='Histories-Interested__Contain--Selection-Button Manager--Selection-Detail'>"+
                                                "<i class='fa-solid fa-circle-info'></i> Chi tiết</button>"+
                                            "<button data-index='"+index+"' data-idarticle='"+element.ID+"' class='Histories-Interested__Contain--Selection-Button Manager--Selection-Update'>"+
                                                "<i class='fa-solid fa-pen'></i> Sửa</button>"+
                                            "<button data-idarticle='"+element.ID+"' class='Histories-Interested__Contain--Selection-Button Manager--Selection-Delete'>"+
                                                "<i class='fa-solid fa-trash'></i> Xóa</button>"+
                                        "</div>"+
                                        "<div class='Manager-Post__Contain--Items-Update'>"+
                                        "<div class='form__body-group'>"+
                                            "<div class='form__body-group-1'>"+
                                                "<h2 class='form__body-group-1-title Manager-Post_Update--Title'>I - Lĩnh vực ứng tuyển</h2>"+
                                                    "<div class='form__body-group-1--Fields'>"+
                                                    "<div class='Contain__Label--Focus Contain__Label--Fields'>"+
                                                        "<input disabled type='text' id='form__body-group-1-input--Fields' class='Login-Card--Focus form__body-group-1-input form__body-group-1-input--Fields' placeholder=' ' value='"+element.nameField+"'>"+
                                                            "<label for='form__body-group-1-input--Fields' class='Login-Label Login-Label--Post form__body-group-1-input--Focus'>lĩnh vực</label>"+
                                                        "</div>"+
                                                        "<input type='text' hidden class='form__body-group-1-input--tempIDFields' value='"+element.IDField+"'></input>"+
                                                        "<button class='form__body-group--Fields form__body-group--Changed-Fields' data-index='"+index+"'>Thay đổi</button>"+
                                                        "<button class='form__body-group--Fields form__body-group--CancelChange-Fields' data-index='"+index+"'>Hủy</button>"+
                                                        "</div>"+
                                                    "<select name='fields' id='' class='category-droplist__Fields post__Personally--Fields form__body-group-1-input'>"+
                                                    "</select>"+
                                                    "<div class='Contain__Label--Focus'>"+
                                                    "<input type='text' id='form__body-group-1-input--Postion' class='Login-Card--Focus form__body-group-1-input--Position form__body-group-1-input' value='"+element.Position+"' placeholder=' ''>"+
                                                        "<label for='form__body-group-1-input--Postion' class='Login-Label Login-Label--Post form__body-group-1-input--Focus'>Vị trí việc làm</label>"+
                                                        "</div>"+
                                                    "<div class='Contain__Label--Focus'>"+
                                                    "<input type='text' id='form__body-group-1-input--Title' class='Login-Card--Focus form__body-group-1-input form__body-group-1-input--Title' value='"+element.title+"' placeholder=' '>"+
                                                        "<label for='form__body-group-1-input--Title' class='Login-Label Login-Label--Post form__body-group-1-input--Focus'>Nhập tiêu đề</label>"+
                                                        "</div>"+
                                                    "</div>"+
                                                "<div class='form__body-group-2'>"+
                                                "<h2 class='form__body-group-2-title Manager-Post_Update--Title'>II - Mô tả</h2>"+
                                                    "<textarea name='introduce' id='' cols='30' rows='10' class='form__body-group-2-area form__body-group-1-input--Description' placeholder='VD: Siêng năng, biết sáng tạo nội dung tiktok, sử dụng thành thạo photoshop...'>"+element.description+"</textarea>"+
                                                    "<div class='Contain__Label--Focus'>"+
                                                    "<input type='number' id='form__body-group-1-input--requirement' class='Login-Card--Focus form__body-group-1-input form__body-group-1-input--experience' value='"+element.experience+"' placeholder=' '>"+
                                                        "<label for='form__body-group-1-input--requirement' class='Login-Label Login-Label--Post form__body-group-1-input--Focus'>Số năm kinh nghiệm</label>"+
                                                        "</div>"+
                                                    "<select name='timeWork' id='' class='form__body-group-2-input post__Company--timeWork'>"+
                                                        "<option disabled selected value>- Thời gian -</option>";
                                                        if(element.timeWork == "Full time")
                                                        {
                                                            postedArticleHTML += "<option selected value='Full time'>Full time</option>"+
                                                                                  "<option value='Part time'>Part time</option>";
                                                        }
                                                        else
                                                        {
                                                            postedArticleHTML += "<option selected value='Part time'>Part time</option>"+
                                                                                   "<option value='Full time'>Full time</option>";
                                                        }
                            postedArticleHTML += "</select>"+
                                                    "<div class='Contain__Label--Focus'>"+
                                                    "<input type='date' id='form__body-group-1-input--dateEnd' class='Login-Card--Focus form__body-group-1-input form__body-group-1-input--dateEnd' value='"+element.dateEnd+"' placeholder=' '>"+
                                                        "<label for='form__body-group-1-input--dateEnd' class='Login-Label Login-Label--Post form__body-group-1-input--Focus'>Thời hạn bài đăng</label>"+
                                                        "</div>"+
                                                    "</div>"+
                                                "<div class='form__body-group-4'>"+
                                                "<button class='form__body-group-4-button Manager-Post--selection-UpdateForm' data-index='"+index+"' data-idarticle='"+element.ID+"'>Lưu chỉnh sửa</button>"+
                                                    "</div>"+
                                                "</div>"+
                                            "</div>"+
                                        "</div>";
                                        index++;
            })

            $('.Manager-Post__Contain--Items').html(postedArticleHTML);

            $('.Manager--Selection-Detail').click(function(){
                let IDArticleCompany = $(this).attr('data-idarticle');
                $(location).attr('href','./DetailsPostPersonally?id='+IDArticleCompany);
            })

            var arrSelectUpdate = document.querySelectorAll('.Manager--Selection-Update');
            var arrManagerUpdate = document.querySelectorAll('.Manager-Post__Contain--Items-Update');
            let listField = document.querySelectorAll('.category-droplist__Fields');

            $('.Manager--Selection-Update').click(function(){
                var IDSelectArticle = $(this).attr('data-index');

                if($(this).hasClass('Manager--Selection-Update'))
                {
                    arrManagerUpdate.forEach(e => {
                        e.style.display = "none";
                    })

                    listField.forEach(e => {
                        e.style.display = "none";
                    })

                    arrSelectUpdate.forEach(e => {
                        e.classList.remove('Manager--Selection-Update-Active');
                        e.classList.add('Manager--Selection-Update');
                    })

                    $(this).removeClass('Manager--Selection-Update').addClass('Manager--Selection-Update-Active');

                    arrManagerUpdate[IDSelectArticle].style.display = "block";
                }
                else
                {
                    if($(this).hasClass('Manager--Selection-Update-Active'))
                    {
                        $(this).removeClass('Manager--Selection-Update-Active').addClass('Manager--Selection-Update');

                        arrManagerUpdate[IDSelectArticle].style.display = "none";
                    }
                }
            })

            $('.form__body-group--Changed-Fields').click(function(){        
                let arrChangedFields = document.querySelectorAll('.form__body-group--Changed-Fields');
                let arrCancelChangedFields = document.querySelectorAll('.form__body-group--CancelChange-Fields');
                let getListFields = document.querySelectorAll('.post__Personally--Fields');
                let listField = document.querySelectorAll('.category-droplist__Fields');
                var IDSelectArticle = $(this).attr('data-index');

                arrChangedFields[IDSelectArticle].style.display = "none";
                arrCancelChangedFields[IDSelectArticle].style.display = "block";
                listField[IDSelectArticle].style.display = "block";
                getListFields[IDSelectArticle].classList.add('post__Company--Fields');
                getFields();
            })
        
            $('.form__body-group--CancelChange-Fields').click(function(){
                let arrChangedFields = document.querySelectorAll('.form__body-group--Changed-Fields');
                let arrCancelChangedFields = document.querySelectorAll('.form__body-group--CancelChange-Fields');
                let getFields = document.querySelectorAll('.post__Personally--Fields');
                let listField = document.querySelectorAll('.category-droplist__Fields');
                var IDSelectArticle = $(this).attr('data-index');

                arrChangedFields[IDSelectArticle].style.display = "block";
                arrCancelChangedFields[IDSelectArticle].style.display = "none";
                listField[IDSelectArticle].style.display = "none";
                getFields[IDSelectArticle].classList.remove('post__Company--Fields');
            })

            $('.Manager--Selection-Delete').click(function(){
                let IDArticle = $(this).attr('data-idarticle');
                $.post('./ManagerPostPersonally/deleteArticlePosted', {IDArticle:IDArticle}, function(){
                    managerArticlePostedPersonally();
                })
            })

            $('.Manager-Post--selection-UpdateForm').click(function(){
                let index = $(this).attr('data-index');
                let arrIDFields = document.querySelectorAll('.form__body-group-1-input--tempIDFields');
                let arrPosition = document.querySelectorAll('.form__body-group-1-input--Position');
                let arrTitle= document.querySelectorAll('.form__body-group-1-input--Title');
                let arrDescription = document.querySelectorAll('.form__body-group-1-input--Description');
                let arrExperience = document.querySelectorAll('.form__body-group-1-input--experience');
                let arrdateEnd= document.querySelectorAll('.form__body-group-1-input--dateEnd');
                let arrtimeWork = document.querySelectorAll('.post__Company--timeWork');

                let IDArticle = $(this).attr('data-idarticle');
                let IDFields = arrIDFields[index].value;

                if(document.querySelector('.post__Company--Fields'))
                {
                    var arrSelection = document.querySelectorAll('.category-droplist__Fields');
                    IDFields = arrSelection[index].value;
                }
    
                let Position = arrPosition[index].value;
                let Title = arrTitle[index].value;
                let Description = arrDescription[index].value;
                let Experience = arrExperience[index].value;
                let dateEnd = arrdateEnd[index].value;
                let timeWork = arrtimeWork[index].value;

                $.post('./ManagerPostPersonally/updateArticlePosted', {IDArticle:IDArticle,IDFields:IDFields, Position:Position, Title:Title, Description:Description, Experience:Experience,dateEnd:dateEnd,timeWork:timeWork}, function(data){
                    $(location).attr('href','ManagerPostPersonally');
                })
            })
        })
    }

    /* -------------------------------------- Histories Interested Personally--------------------------------------  */
    historiesInterested();

    $('.user-menu__list-item--WorkInterested').click(function(){
        $(location).attr('href','HistoriesInterested');
    })
    
    function historiesInterested()
    {
        $.post("./Personally/getArticleInterested", function(data){
            var obj = JSON.parse(data);

            let interestedHTML = '';

            obj.forEach(element => {
                interestedHTML += "<div class='Histories-Interested__Contain--Item'>"+
                                    "<div class='Histories-Interested__Contain--Image'>"+
                                        "<img src='"+element.image+"' alt=''>"+
                                    "</div>"+
                                    "<div class='Histories-Interested__Contain--Content'>"+
                                        "<h3 class='Histories-Interested__Contain--Title'>"+element.title+"</h3>"+
                                        "<p class='Histories-Interested__Contain--Description'>"+element.description+"</p>"+
                                    "</div>"+
                                    "<div class='Histories-Interested__Contain--Selection'>"+
                                        "<button data-idarticle="+element.IDArticleCompany+" class='Histories-Interested__Contain--Selection-Button Histories-Interested__Contain--Selection-Detail'>"+
                                            "<i data-idarticle="+element.IDArticleCompany+" class='fa-solid fa-circle-info'></i> Chi tiết</button>"+
                                        "<button data-idarticle="+element.IDArticleCompany+" class='Histories-Interested__Contain--Selection-Button Histories-Interested__Contain--Selection-Delete'>"+
                                        "<i data-idarticle="+element.IDArticleCompany+" class='fa-solid fa-trash'></i> Xóa</button>"+
                                    "</div>"+
                                "</div>";
            });

            $('.Histories-Interested__Contain--Items').html(interestedHTML);

            $('.Histories-Interested__Contain--Selection-Detail').click(function(){
                let IDArticleCompany = $(this).attr('data-idarticle');
                $(location).attr('href','./DetailsPostCompany?id='+IDArticleCompany);
            })

            $('.Histories-Interested__Contain--Selection-Delete').click(function(){
                let IDArticle= $(this).attr('data-idarticle');
                
                $.post("./Personally/unsetArticle", {IDArticle:IDArticle}, function(){
                    historiesInterested();
                });
            })
        }); 
    }
    /* -------------------------------------- lấy dữ liệu checkbox --------------------------------------  */

    function getValue(className) {
        var value = [];
        $('.' + className + ':checked').each(function() {
            value.push($(this).val());
        })

        return value;
    }

    function getCity() {
        $.post('./User/getCity', function(data) {
            let obj = JSON.parse(data);

            let cityHTML = '';
            let chooseCityHTML = '';
            let i = 0;
            obj.forEach(element => {
                cityHTML += "<option value='" + element.matp + "-" + element.name + "'>" + element.name + "</option>"
                chooseCityHTML += "<label for='cbCity" + i + "' class='choose__City'>" +
                    "<input type='checkbox' class='cbCity selection__User' id='cbCity" + i + "' name='cbCity' class='choose__City' value='" + element.name + "'>" + element.name + "</label>";
                i++;
            });

            $('.Register-Infor__Address--City').html(cityHTML);
            $('.Droplist-City').html(chooseCityHTML);

            $('.selection__User').click(function() {
                page = 0;
                userControlPage();
                userControlPage_Personally();
            })
        });
    }

    function getFields() {
        $.post('./Fields/getFields', function(data) {
            let obj = JSON.parse(data);

            let fieldsHTML = '';

            obj.forEach(element => {
                fieldsHTML += "<option value='" + element.ID + "'>" + element.nameField + "</option>";
            });

            $('.Register-Infor__Address--Fields').html(fieldsHTML);
            $('.category-droplist__Fields').html(fieldsHTML);

            $('.category-droplist__Fields').click(function() {
                page = 0;
                userControlPage();
                userControlPage_Personally();
            })
        })
    }

    function changeRegister(RegisterFadeOut, RegisterFadeIn) {
        document.querySelector("." + RegisterFadeOut).style.display = "none";
        document.querySelector("." + RegisterFadeIn).style.display = "flex";
    }

    function changedCapcha() {
        //các số và từ
        var permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        var code = "";
        for (var i = 0; i < 5; i++) {
            //tạo random
            var randomCode = permitted_chars.charAt(Math.floor(Math.random() * permitted_chars.length));

            //nối chuỗi
            code = code + randomCode;
        }

        if (document.querySelector('.Code')) {
            document.querySelector('.Code').value = code;
        }
    }

    function changedPrice(price) {
        var priceChanged = price.toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });

        return priceChanged;
    }

    function formatDate(dateObject) {
        var d = new Date(dateObject);
        var day = d.getDate();
        var month = d.getMonth() + 1;
        var year = d.getFullYear();
        if (day < 10) {
            day = "0" + day;
        }
        if (month < 10) {
            month = "0" + month;
        }
        var date = day + "/" + month + "/" + year;

        return date;
    };

    function changeFields(classIn,classOut)
    {
        document.querySelector('.' + classIn).style.display = "block";
        document.querySelector('.' + classOut).style.display = "none";
    }
});