class SectionChoice {
    constructor(choice) {
        choices["sectionChoice"] = choice;

        this.choice = choice;
        this.fetchUrl = "getFacilities.php?section_id=" + this.choice;
        this.handleChoice = () => {
            this.getData().then(result => {
                this.emplaceData(result.facilities);
            });
        };
        this.getData = () => {
            return fetch(this.fetchUrl).then(response => response.json());
        };
        this.emplaceData = (facilities) => {
            const facilitiesTab = document.getElementById("facilities");
            removeAllChildren(facilitiesTab);
            for (let f of facilities) {
                const facilityListItem = this.createFacilityListItem(f["facility_id"], f["facility_name"]);
                facilitiesTab.appendChild(facilityListItem);
            }
        };
        this.createFacilityListItem = (facilityId, facilityName) => {
            const facility = document.createElement("button");
            facility.innerText = facilityName;
            facility.classList.add("list-group-item", "list-group-item-action");
            facility.addEventListener('click', () => {
                onClick(FACILITY_TAB, facilityId);
            });
            return facility;
        };
        function removeAllChildren(element) {
            while (element.firstChild) {
                element.removeChild(element.firstChild);
            }
        }
    }
}



function FacilityChoice(choice) {
    this.choice = choice;
    this.fetchUrl = "getComponents.php?facility=" + this.choice;

    this.handleChoice = () => {
        this.getData().then(result => {
            this.emplaceData(result);
        });
    }

    this.getData = () => {
        return fetch(this.fetchUrl).then(response => response.json())
    }

    this.emplaceData = (components) => {
        const componentsTab = document.getElementById("components");
        removeAllChildren(componentsTab);

        for(let f of components) {
            const componentsListItem =
                this.createComponentsListItem(f["component_id"], f["component_name"]);

            componentsTab.appendChild(componentsListItem);
        }
    }

    this.createComponentsListItem = (componentId, componentName) => {
        const component = document.createElement("button");
        component.innerText = componentName;
        component.classList.add("list-group-item", "list-group-item-action");
        component.addEventListener('click', () => {
            onClick(COMPONENT_TAB, componentId);
        });

        return component;
    }

    function removeAllChildren(element) {
        while(element.firstChild){
            element.removeChild(element.firstChild);
        }
    }
}



function ComponentChoice(choice) {
    //The `choice` parameter will be required
    //in future

    choices["componentChoice"] = choice;

    this.choice = choice;
    this.fetchUrl = "getActivities.php";

    this.handleChoice = () => {
        this.getData().then(result => {
            this.emplaceData(result.activities);
        });
    }

    this.getData = () => {
        return fetch(this.fetchUrl).then(response => response.json());
    }

    this.emplaceData = (data) => {
        const tab = document.getElementById("activities");
        removeAllChildren(tab);

        for(let d of data) {
            const activityItem =
                this.createItem(d["activity_id"], d["activity_name"]);

            tab.appendChild(activityItem);
        }
    }

    this.createItem = (activityId, activityName) => {
        const domParser = new DOMParser();
        const domString = `
            <div class="form-check form-check-inline my-3">
                <input class="form-check-input" onchange="handleActivitiesCheckboxChange(event); handleChange()" type="checkbox" id="${activityId}" value="${activityId}">
                <label class="form-check-label" for="${activityId}">${activityName}</label>
            </div>
        `;

        return domParser.parseFromString(domString, "text/html").body.firstChild;
    }

    function removeAllChildren(element) {
        while(element.firstChild){
            element.removeChild(element.firstChild);
        }
    }
}



class ActivitiesTabChoiceHandler {
    // constructor(choice)
}