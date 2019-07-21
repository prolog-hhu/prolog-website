class Navigation {

    constructor(id, toggleId, closerId) {

        this.navigation = document.getElementById(id);
        this.toogleItem = document.getElementById(toggleId);
        this.closerItem = document.getElementById(closerId);

        this.toogleItem.addEventListener('click', this.handleToggle.bind(this));
        this.closerItem.addEventListener('click', this.handleClose.bind(this));
    }

    handleToggle() {
        this.navigation.classList.toggle("active");
    }

    handleClose() {
        this.navigation.classList.remove("active");
    }

}

const navigation = new Navigation("navigation", "open-navigation", "close-navigation");