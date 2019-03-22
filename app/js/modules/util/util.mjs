export function getClosestParentBySelector(element, selector) {
    if(!Element.prototype.matches) {
        Element.prototype.matches =
            Element.prototype.msMatchesSelector;
    }

    for(; element && element !== document; element = element.parentNode) {
        if(element.matches(selector)) return element;
    }

    return null;
}