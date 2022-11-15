<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/images/Avatar/logo.png" type="image/x-icon" sizes="32*32">
    <link rel="stylesheet" href="./public/font/fontawesome-free-6.0.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/css/home.css">
    <link rel="stylesheet" href="public/css/slickSlider.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <title>Trang Chủ</title>
</head>

<body>
    <?php require_once './mvc/views/Pages/Header.php' ?>

    <div class="image-slider">
      <div class="image-item">
         <div class="image">
            <img
            src="https://images.unsplash.com/photo-1580894894513-541e068a3e2b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
            alt=""
            />
         </div>
      </div>
      
      <div class="image-item">
         <div class="image">
            <img
            src="https://images.unsplash.com/photo-1457305237443-44c3d5a30b89?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1174&q=80"
            alt=""
            />
         </div>
      </div>
      
      <div class="image-item">
         <div class="image">
            <img
            src="https://images.unsplash.com/photo-1580894896813-652ff5aa8146?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
            alt=""
            />
         </div>
      </div>
      <div class="image-item">
         <div class="image">
            <img
            src="https://images.unsplash.com/photo-1580982324076-d95230549339?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
            alt=""
            />
         </div>
      </div>
   </div>

    <section class="box-content">
        <div class="box-content__banner">
            <img src="https://img.freepik.com/free-vector/illustration-social-media-concept_53876-17855.jpg?w=1060&t=st=1663605689~exp=1663606289~hmac=fb74a181343c19a051aac7b3e06fae01f9e45636862aa56b3b06fc657fdc504d"
                alt="">
        </div>
        <div class="box-content__details">
            <h1 class="box-content__details-title">Các bài tuyển dụng hot</h1>
            <p class="box-content__details-contanet">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quos
                dicta modi corporis labore pariatur nam iusto? Id sequi qui molestiae fuga totam, veritatis voluptatum
                minus accusamus nesciunt ad doloribus!
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias officiis labore qui temporibus
                excepturi laboriosam nulla earum dolorem quis, ratione doloremque. Dolore ut explicabo reprehenderit
                saepe? Consequuntur deleniti quaerat labore?
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quasi id perspiciatis ipsa adipisci corrupti,
                cumque ea dicta dignissimos, consequuntur aliquid odio similique cum enim dolorum ipsam eos illum.
                Quasi, quas?</p>
        </div>
    </section>

    <!-- treding post hot -->
    <section class="trending-job">
      <h3 class="trending-job__title">Top Bài Tuyển Dụng Hot</h3>
        <div class="contain">
            <ul class="treding-job__list">

            </ul>
        </div>
    </section>

    <div class="top-fields">
      <h3 class="top-fields__title">Top Ngành Nghề Nổi Bật</h3>
      <div class="top-fileds__contain">
         <div class="top-fields__item">
            <div class="top-fields__item-icon">
               <i class="fa-solid fa-briefcase"></i>
            </div>
            <div class="top-fields__item-info">
               <div class="top-fields__item-name"><p class="">IT Phần Mềm</p></div>
               <p class="top-fields__item-amountwork">83.722 việc làm</p>
            </div>
         </div>
      </div>
   </div>

   <?php require_once './mvc/views/Pages/Footer.php' ?>

   <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js" ></script>
   <script type="text/javascript"src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
   <script src="./public/js/Ajax.js"></script>
   <script src="./public/js/home.js"></script>
   <script>
      const listMenuItem = document.querySelectorAll('.menu__list-link');
      listMenuItem.forEach((item) =>{
         if(item.innerText === 'Giới Thiệu')
            item.classList.add('active');
         else item.classList.remove('active');
      })
   </script>
</body>

</html>