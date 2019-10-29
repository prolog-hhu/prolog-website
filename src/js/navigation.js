class Navigation {

    constructor(id, openerId, closerId) {

        this.page = document.getElementById("page");

        this.navigation = document.getElementById(id);
        this.openerItem = document.getElementById(openerId);
        this.closerItem = document.getElementById(closerId);

        this.fader = this.createFader();

        this.openerItem.addEventListener('click', this.handleOpen.bind(this));

        this.fader.addEventListener('click', this.handleClose.bind(this));
        this.closerItem.addEventListener('click', this.handleClose.bind(this));
    }


    handleOpen() {
        this.navigation.classList.add("active");

        document.body.appendChild(this.fader);

        this.page.style.height = this.navigation.clientHeight + 'px';
        this.page.style.overflow = 'hidden';
    }


    handleClose() {
        this.navigation.classList.remove("active");

        document.body.removeChild(this.fader);

        this.page.style.height = null;
        this.page.style.overflow = null;
    }


    createFader() {
        let fader = document.createElement("div");
        fader.id = "fader";
        fader.className = "top-0 left-0 position-fixed width-full height-full bg-gray-dark";

        return fader;
    }
}

const navigation = new Navigation("navigation", "open-navigation", "close-navigation");