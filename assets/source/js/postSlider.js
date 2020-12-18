const SELECTOR_CONTAINER = '.js-post-slider';
const SELECTOR_FLICKITY = '.js-post-slider__flickity';
const SELECTOR_PREV_BUTTON = '.js-post-slider__prev';
const SELECTOR_NEXT_BUTTON = '.js-post-slider__next';

const DATA_ATTRIBUTE_FLICKITY_OPTIONS = 'data-flickity-options';

const init = containerElement => {
    const flickityContainer = containerElement.querySelector(SELECTOR_FLICKITY);
    const flickityJson = flickityContainer?.getAttribute(DATA_ATTRIBUTE_FLICKITY_OPTIONS);
    const flickityOptions = flickityJson ? JSON.parse(flickityJson) : false;        
    const flickityInstance =  flickityContainer && flickityOptions 
    ? new Flickity(flickityContainer, flickityOptions) 
    : false;
    
    const prevButton = containerElement.querySelector(SELECTOR_PREV_BUTTON);
    const nextButton = containerElement.querySelector(SELECTOR_NEXT_BUTTON);
    
    if (flickityInstance?.previous && prevButton) {
        prevButton.addEventListener('click', (e) => {
            e.preventDefault();
            flickityInstance.previous();
        });
    }
    
    if (flickityInstance?.next && nextButton) {
        nextButton.addEventListener('click', (e) => {
            e.preventDefault();
            flickityInstance.next();
        });
    }
}

export default function() {
    const postSliderContainers = document.querySelectorAll(SELECTOR_CONTAINER);

    if (postSliderContainers.length > 0 
        && typeof Flickity !== 'undefined') {
        postSliderContainers.forEach(init);
    }
}