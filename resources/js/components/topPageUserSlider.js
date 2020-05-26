const $slider = $('#js-slider--usr');
const $slideItem = $('.js-slide__item--usr');
let sliderWidth = $slider.innerWidth();
let slideItemMarginRight = parseInt($slideItem.css('margin-right'));
let slideItemWidth = (sliderWidth - slideItemMarginRight * 2) / 3;

const $prevBtn = $('#js-slide__prev--usr');
const $nextBtn = $('#js-slide__next--usr');

let currentPosition = 0;
let currentIndex = 1;
let slideItemCount = $slideItem.length;
let slideItemPages = Math.ceil(slideItemCount / 3);

let startPage = 1;
let endPage = slideItemPages;

setInActiveClass(); 

console.log('slideItemCount');
console.log(slideItemCount);
console.log('slideItemPages');
console.log(slideItemPages);

function setInActiveClass() {
    $nextBtn.removeClass('is-inactive');
    $prevBtn.removeClass('is-inactive');
    
    if (currentIndex === startPage) {
        $prevBtn.addClass('is-inactive');
    } else if (currentIndex === endPage) {
        $nextBtn.addClass('is-inactive');
    }
}

$(document).on('click', '#js-slide__next--usr', function () {
    console.log('nextBtn');
    currentIndex++
    setInActiveClass();

    currentPosition -= sliderWidth + slideItemMarginRight; 
    console.log('currentPosition');
    console.log(currentPosition);
    $slider.css('transform','translateX('+ currentPosition +'px)')
})
$(document).on('click', '#js-slide__prev--usr', function () {
    console.log('prevBtn');
    currentIndex--
    setInActiveClass();

    currentPosition += sliderWidth + slideItemMarginRight; 
    console.log('currentPosition');
    console.log(currentPosition);
    $slider.css('transform','translateX('+ currentPosition +'px)')
})


console.log(sliderWidth);
console.log(slideItemWidth);
console.log(slideItemMarginRight);
console.log(typeof(slideItemMarginRight));
$slideItem.css('width', slideItemWidth);