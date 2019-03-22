let chosenStaff = [];

function getStaffBySection(section) {
    const fetchUrl = "getStaff.php?section=" + section;
    return fetch(fetchUrl).then(response => response.json())
}

function emplaceElements(staff) {
    const container = document.getElementById("staff");
    console.log("-------", staff);

    for(let s of staff) {
        const el = createStaffListElements(s["staff_id"], s["staff_name"]);
        container.appendChild(el);
    }
}

function createStaffListElements(staffId, name) {
    const domParser = new DOMParser();
    const domString =  `
        <button class="list-group-item list-group-item-action" onclick="handleListItemClick(event);">
            <input type="checkbox" value="${staffId}" class="mr-3" onchange="handleStaffSelection(event);">
            <span>${name}</span>
        </button>
    `;
    return domParser.parseFromString(domString, "text/html").body.firstChild;
}

function handleListItemClick(e) {
    console.log("---e---", e);
    console.log("---e.target---", e.target);
    const checkbox = getInnerCheckBox(e.target);
    checkbox.click();
}

function getInnerCheckBox(parentEl) {
    for(let child of parentEl.childNodes) {
        if(child.tagName === "INPUT") {
            return child;
        }
    }
}

function renderStaffListForSection(section) {
    getStaffBySection(section).then(staff => {
        console.log(staff);
        emplaceElements(staff);
    });
}

function handleStaffSelection(e) {
    const checkbox = e.target;
    if(checkbox.checked) {
        chosenStaff.push(checkbox.value);
    } else {
        removeByValue(chosenStaff, checkbox.value);
    }
    console.log("Chosen staff:", chosenStaff);
}

//Duplicate
function removeByValue(array, value) {
    const index = array.indexOf(value);
    if(index > -1) {
        array.splice(index, 1);
    }
}
