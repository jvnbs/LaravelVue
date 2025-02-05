// sticky header 
$(window).scroll(function(){
    if ($(window).scrollTop() >= 100) {
        $('.site-header').addClass('fixed-header');
    }
    else {
        $('.site-header').removeClass('fixed-header');
    }
});


window.addEventListener("DOMContentLoaded", (event) => {
// navbar toggle
$(".navbar-toggler").click(function(){
   $("body").toggleClass("main");
});


 var btnContainer = document.getElementById("main-nav");
 var btns = btnContainer.getElementsByClassName("nav-item");


document.querySelectorAll(".nav-item").forEach((ele) =>
  ele.addEventListener("click", function (event) {
    event.preventDefault();
    document
      .querySelectorAll(".nav-item")
      .forEach((ele) => ele.classList.remove("active"));
    this.classList.add("active")
  })
);


$("#main-nav .nav-item.active").click(function() {
     $(btns).removeClass('active');
});

$("#content, .user-favorite").click(function() {
     $('#main-nav .nav-item').removeClass('active');
     $('body').removeClass('main');
});

 $(function() {
  $('.category-menu:not(.menu-browse-all)').on('mouseover focus', function() {
    $(this).addClass('active-menu');
  }).on('mouseleave blur', function() {
    $('.category-menu').removeClass('active-menu');
  })
});
});



// favorite icon
    $(".fav_icon").click(function(){
      $(this).toggleClass("active");
    });

    

// review modal 

const submitAddReview = (e) => {
  console.log('Form subbmitted!');
  e.preventDefault();
  closeModal();
};

const closeModal = () => {
  modal.classList.remove('show');

  const form = document.getElementById('review-form');
  form.reset();
  focusedElementBeforeModal.focus();
};

const setFocus = (evt) => {
  const rateRadios = document.getElementsByName('rate');
  const rateRadiosArr = Array.from(rateRadios);
  const anyChecked = rateRadiosArr.some(radio => { return radio.checked === true; });
  if (!anyChecked) {
    const star1 = document.getElementById('star1');
    star1.focus();
  }
};

const navRadioGroup = (evt) => {
  const star1 = document.getElementById('star1');  
  const star2 = document.getElementById('star2');  
  const star3 = document.getElementById('star3');  
  const star4 = document.getElementById('star4');  
  const star5 = document.getElementById('star5');  

  if (['ArrowRight', 'ArrowLeft', 'ArrowDown', 'ArrowUp'].includes(evt.key)) {
    evt.preventDefault();
    if (evt.key === 'ArrowRight' || evt.key === 'ArrowDown') {
      switch(evt.target.id) {
        case 'star1':
          star2.focus();
          star2.checked = true;
          break;
        case 'star2':
          star3.focus();
          star3.checked = true;
          break;
        case 'star3':
          star4.focus();
          star4.checked = true;
          break;
        case 'star4':
          star5.focus();
          star5.checked = true;
          break;
        case 'star5':
          star1.focus();
          star1.checked = true;
          break;
      }
    } else if (evt.key === 'ArrowLeft' || evt.key === 'ArrowUp') {
      switch(evt.target.id) {
        case 'star1':
          star5.focus();
          star5.checked = true;
          break;
        case 'star2':
          star1.focus();
          star1.checked = true;
          break;
        case 'star3':
          star2.focus();
          star2.checked = true;
          break;
        case 'star4':
          star3.focus();
          star3.checked = true;
          break;
        case 'star5':
          star4.focus();
          star4.checked = true;
          break;
      }
    }
  }
};




// sign In page 

window.addEventListener('load', function () {
$('#passwordFiled').hide();
$('#SubmitBtn').hide();
$("#countinueBtn").click(function() {
$('#SubmitBtn').show('20');
$('#passwordFiled').show('20');
$('#countinueBtn').hide('20');
});
})