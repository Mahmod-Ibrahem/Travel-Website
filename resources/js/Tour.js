document.addEventListener("DOMContentLoaded", function () {

    /*Image Slider Button*/
    const slides = document.getElementsByClassName("mySlides")
    const img_opacity = document.getElementsByClassName("image-gallery")

    function OpenLightBox()
    {
        LightBox.classList.toggle('hidden')
        intro.classList.toggle('hidden')
        footer.classList.toggle('hidden')
        navbar.classList.toggle('hidden')
        TourSection.classList.toggle('hidden')
    }
  /*Light Box*/
    const LightBox=document.getElementById('image_lbox')
    const intro=document.getElementById('intro')
    const footer=document.getElementById('footer')
    const TourSection=document.getElementById('Tours')
    const navbar=document.getElementById('navbar')
    const img_lbox_close=document.getElementById('lbox_close')
    const LightBox_prev=document.getElementById('LightBox_prev')
    const LightBox_next=document.getElementById('LightBox_next')
    const LightBox_slides=document.getElementsByClassName('LightBox_Slides')
    const LightBox_img_opacity=document.getElementsByClassName('LightBox_image-gallery')

    img_lbox_close.addEventListener('click',function(){
        LightBox.classList.toggle('hidden')
        intro.classList.toggle('hidden')
        footer.classList.toggle('hidden')
        navbar.classList.toggle('hidden')
        TourSection.classList.toggle('hidden')
    })

    const slideshow_imgs = document.querySelectorAll('[id^="img_"]')
    if(slideshow_imgs.length>0)
    {
    slideshow_imgs.forEach((slideshow_imgs, index) => {
 slideshow_imgs.addEventListener("click", () => {
     OpenLightBox()
     LightBox_slides[index].classList.add('animate-zoom')
     LightBox_currentSlide(index + 1)
     // Call LightBox_currentSlide function with index + 1 as argument
 })
})
    }

let LightBox_index = 1; // Initialize the index for the LightBoxSlider
if(LightBox_slides.length>0)
{
LightBoxSlider(LightBox_index)
}
function LightBox_currentSlide(n) {
    LightBoxSlider(LightBox_index = n)
}
//  // Select all lightbox image elements
 const lb_imgs = document.querySelectorAll('[id^="Lightbox_img"]')
// // Add event listeners to each lightbox image element

lb_imgs.forEach((lb_img, index) => {
    lb_img.addEventListener("click", () => {
        LightBox_slides[LightBox_index-1].classList.remove('animate-zoom')
        LightBox_currentSlide(index + 1) // Call LightBox_currentSlide function with index + 1 as argument
    })
})

// // Add event listeners to previous and next buttons

LightBox_prev.addEventListener("click", function () {
    LightBox_plusSlides(-1)
})

LightBox_next.addEventListener("click", function () {
    LightBox_plusSlides(1)
})

// Define LightBox_plusSlides function
    function LightBox_plusSlides(n) {
        LightBox_slides[LightBox_index-1].classList.remove('animate-zoom')
        LightBoxSlider(LightBox_index += n)

    }

// // Define LightBoxSlider function
function LightBoxSlider(n) {
    let i=1
    // Wrap around if index goes out of bounds
    if (n > LightBox_slides.length) {
        LightBox_index = 1
    }
    if (LightBox_index < 1) {
        LightBox_index = LightBox_slides.length
    }

    // Hide all lightbox slides

    for (i = 0;  i < LightBox_slides.length; i++)
    {
       LightBox_slides[i].style.display ='none'
   }
        for (i = 0; i < LightBox_img_opacity.length; i++) {
            LightBox_img_opacity[i].classList.remove("opacity-100");
            LightBox_img_opacity[i].classList.add("opacity-50");
        }

    // Show the current slide and adjust opacity
    LightBox_slides[LightBox_index-1].style.display = "block"
    LightBox_img_opacity[LightBox_index-1].classList.remove("opacity-50");
    LightBox_img_opacity[LightBox_index-1].classList.add("opacity-100");
}

// /*End Of Light Box*/
    let prev_activ_tab=0
    const tabs=document.querySelectorAll('[id^="tab_"]')

    tabs.forEach(function (Tab,index)
     {
        Tab.addEventListener("click",function()
        {
            tabstyle(this)
            if(prev_activ_tab!==index)
                {
                    tabs[prev_activ_tab].classList.remove('bg-white')
                    tabs[prev_activ_tab].classList.remove('text-gray-900')
                    tabs[prev_activ_tab].classList.add('text-white')
                }
                prev_activ_tab=index
                tapcontent_group.forEach(function(content){
                    content.classList.add('hidden')
                })
                tapcontent_group[index].classList.remove('hidden')
        })
    });
    function tabstyle(clickedbutton){
        clickedbutton.classList.remove('text-white')
        clickedbutton.classList.add('bg-white')
        clickedbutton.classList.add('text-gray-900')
    }
//                                   /* Tap Ends*/

                                    /*Itenary*/
const Itenary_btn=document.querySelectorAll('[id^="day_"]')
 const PlusSign=document.querySelectorAll('[id^="plusSign_"]')
 const MinusSign=document.querySelectorAll('[id^="MinusSign_"]')
Itenary_btn.forEach(function(btn,index)
{
btn.addEventListener('click',function()
{
        btn.classList.toggle('max-h-96')
        btn.classList.toggle('max-h-12')
        setTimeout(() => {
            PlusSign[index].classList.toggle('hidden')
            MinusSign[index].classList.toggle('hidden')
        }, 100);
})
})

                    /* Button Group */
 const tapcontent_group=document.querySelectorAll('[id^="tabContent_"]')
tapcontent_group.forEach(function(content){
    content.classList.add('hidden')
})
                                          //     /* SlideShow*/

// // Select all dot elements
const dots = document.querySelectorAll('[id^="dot"]');
let slideIndex = 1
let previousIndex = 0

// Add event listeners to each dot element
if(dots.length>0)
{
dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
        currentSlide(index + 1); // Call currentSlide function with index + 1 as argument
    });
});
}

    prev.addEventListener("click", function () {
        plusSlides(-1);
    });
    next.addEventListener("click", function () {
        plusSlides(+1);
    });

    showSlides(slideIndex)

    function plusSlides(n) {
        previousIndex=slideIndex
        slideIndex+=n
        showSlides((slideIndex))
    }

    function currentSlide(n) {
        previousIndex=slideIndex
        slideIndex=n
        showSlides((slideIndex))
    }

    function showSlides(n) {
        let i;
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }

        if(previousIndex>0)
            {
        slides[previousIndex-1].style.display='none'
            }

        for (i = 0; i < img_opacity.length; i++) {
            img_opacity[i].classList.remove("opacity-100")
            img_opacity[i].classList.add("opacity-50")
        }

        slides[slideIndex - 1].style.display = "block";
        img_opacity[slideIndex - 1].classList.remove("opacity-50") // remove old opacity
        img_opacity[slideIndex - 1].classList.add("opacity-100") // Add opacity class to the current image
    }
})
// const p_adult=document.getElementById('p_adult')
// const p_childeren=document.getElementById('p_Childeren')
// var validation=true
// p_adult.addEventListener('blur',(e)=>{
//     Validate(e.target.value)
//     if(validation===false)
//     {
//         p_adult.classList.remove('border-green-500')
//         p_adult.classList.add('border-red-500')
//     }
//     else
//     {
//         p_adult.classList.remove('border-red-500')
//         p_adult.classList.add('border-green-500')
//     }
// })
// p_childeren.addEventListener('blur',(e)=>{
//     Validate(e.target.value)
//     if(validation===false)
//     {
//         p_childeren.classList.remove('border-green-500')
//         p_childeren.classList.add('border-red-500')
//     }
//     else
//     {
//         p_childeren.classList.remove('border-red-500')
//         p_childeren.classList.add('border-green-500')
//     }
// })
// function Validate(val)
// {
//     if(val <0 || isNaN(val) || val !== val.trim()  || val.trim() == '')
//     {
//         validation=false
//     }
//     else if(val>=0)
//     {
//         validation=true
//     }
// }
// });
