
//trending-job
function htmlsCode(avt,name,datePost,title,desc,requirement,city,id){
   return `
   <li class="treding-job__post">
      <div class="treding-job__post-header">
         <div class="header__left">
            <img class="company-avt" src="${avt}" alt="">
         </div>
         <div class="header__right">
            <p class="company-name">${name}</p>  
            <p class="post-date">${datePost}</p>
         </div>
         
      </div>
      <div class="header__city">
            <i class="fa-solid fa-location-dot"></i>
            <p>${city}</p>
         </div>
      <div class="treding-job__post-contain">
         <h4 class="post-title">${title}</h4>
         <p class="post-desc">${desc}</p>
         <div class="post-requirement">Yêu cầu công việc: ${requirement}</div>
      </div>
      <div class="treding-job__post-bottom">
         <a href="DetailsPostCompany?id=${id}" target = "_blank"><button class="post-btn">Xem Thêm</button></a>
      </div>
   </li>
   `
}

var api = 'http://localhost/chiasenhanluc/Company/getTopAritcleCompany';

fetch(api)
   .then(function(response) {
      return response.json();
   })
   .then(function(posts) {
      var htmls = posts.map(function(post) {
         return htmlsCode(post.image, post.name,post.datePost,post.title,post.description,post.requirement,post.city,post.ID);
      })
      document.querySelector('.treding-job__list').innerHTML = htmls.join(' ');
      
   });

   

var apiTopFields = 'http://localhost/chiasenhanluc/Fields/getTopFields'
fetch(apiTopFields)
   .then(function(response) {
      return response.json();
   })
   .then(function(posts) {
      var htmls = posts.map(function(post) {
         return `<div class="top-fields__item">
         <div class="top-fields__item-icon">
            <i class="fa-solid fa-briefcase"></i>
         </div>
         <div class="top-fields__item-info">
            <div class="top-fields__item-name"><p>${post.nameField}</p></div>
            <p class="top-fields__item-amountwork">${post.amountWork} việc làm</p>
         </div>
      </div>`
      })

      document.querySelector('.top-fileds__contain').innerHTML = htmls.join(' ')
      $(document).ready(function(){
         $('.top-fileds__contain').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: `<button type='button' class='slick-prev top-fields__slick-prev slick-arrow top-fields__arrow'><ion-icon name="arrow-back-outline"></ion-icon></button>`,
            nextArrow: `<button type='button' class='slick-next top-fields__slick-next slick-arrow top-fields__arrow'><ion-icon name="arrow-forward-outline"></ion-icon></button>`,
            autoplay: true,
            autoplaySpeed: 1000,
          });
       });
   })

//slick slier
// slider banner
$(document).ready(function () {
   $(".image-slider").slick({
     slidesToShow: 1,
     slidesToScroll: 1,
     infinite: true,
     arrows: true,
     draggable: false,
     prevArrow: `<button type='button' class='slick-prev slick-arrow'><ion-icon name="arrow-back-outline"></ion-icon></button>`,
     nextArrow: `<button type='button' class='slick-next slick-arrow'><ion-icon name="arrow-forward-outline"></ion-icon></button>`,
     dots: true,
     responsive: [
       {
         breakpoint: 1025,
         settings: {
           slidesToShow: 3,
         },
       },
       {
         breakpoint: 480,
         settings: {
           slidesToShow: 1,
           arrows: false,
           infinite: false,
         },
       },
     ],
     autoplay: true,
     autoplaySpeed: 1000,
   });
 });



