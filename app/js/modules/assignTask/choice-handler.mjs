import {getClosestParentBySelector} from "../util/util.mjs";
import { TAB_CSS_SELECTOR,  } from "./constants.mjs";

export default class ChoiceHandler {
    
    // constructor(choice, event) {
    //     this.choice = choice;
    //     this.tab = getClosestParentBySelector(event.target, TAB_CSS_SELECTOR);
    // }

    static handle(choice, event) {
        const tab = getClosestParentBySelector(event.target, TAB_CSS_SELECTOR);

        switch (tab) {
            case SECTIONS_TAB:
                //
                break;
        
            default:
                break;
        }
    }

    static ble() {
        console.log("ble ble");
    }
}