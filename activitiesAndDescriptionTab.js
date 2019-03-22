var chosenActivities = [];
const nextButton = document.getElementById("btn-next");
const taskDescriptionTextArea = document.getElementById("taskDescription");

function handleActivitiesCheckboxChange(event) {
    if(event.target.checked) {
        chosenActivities.push(event.target.value);
    } else {
        removeByValue(chosenActivities, event.target.value);
    }
}

function removeByValue(array, value) {
    const index = array.indexOf(value);
    if(index > -1) {
        array.splice(index, 1);
    }
}

function isTabValid() {
    let areActivitiesChosen = chosenActivities.length > 0;
    let isTaskDescriptionGiven = taskDescriptionTextArea.value !== "";

    return areActivitiesChosen && isTaskDescriptionGiven;
}

function handleChange() {
    if(isTabValid()) {
        nextButton.style.display = "inline-block";
    } else {
        nextButton.style.display = "none";
    }
}

nextButton.addEventListener("click", () => {
    choices["activities"] = chosenActivities;
    choices["taskDescription"] = taskDescriptionTextArea.value;

    console.log("Choices:", choices);
    onClick(ACTIVITY_DESCRIPTION_TAB, null);
})