
export default class TabNavigator {

    constructor(tabs) {
        this.tabs = tabs;
        this.currentTab = 0;
    }

    showFirstTab() {
        this.showTab(0);
    }

    showTab(tab) {
        this.tabs[tab].classList.remove("d-none");
        this.updateProgressBar();

        document.getElementById("btn-next").style.display = "none";
    }

    updateProgressBar() {
        const total = this.tabs.length;
        const progressBar = document.getElementById("progressBar");
        progressBar.style.width = (this.currentTab/total)*100 + "%";
    }

    nextTab() {
        tabs[currentTab].classList.add("d-none");
        showTab(++currentTab);
    }

    previousTab() {
        tabs[currentTab].classList.add("d-none");
        showTab(--currentTab);
    }
}