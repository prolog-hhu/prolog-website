class DropdownAnswer {
  constructor(el) {
    // save self DOM element (container, input, response), state handler
    this.answer = el;
    this.select = this.answer.querySelector("select");
    this.response = this.answer.querySelector(".response");

    this.state = null;
    this.responseContent = "";
  }

  updateState() {
    let selectedID = this.select.selectedIndex;

    if (this.select.options[selectedID].hasAttribute("correct")) {
      this.state = true;
      this.responseContent = "";
    } else {
      this.state = false;
      this.responseContent = this.select.options[selectedID].dataset.return;

      if (this.responseContent == "") {
        this.responseContent = config["DefaultResponseFalse"];
      }
    }
    return this.state;
  }

  updateResponse() {
    if (this.state === true) {
      this.answer.classList.remove("errored");
      this.response.innerHTML = "";
    } else {
      this.answer.classList.add("errored");
      this.response.innerHTML = this.responseContent;
    }
  }
}

const config = {
  DefaultResponseFalse: "Nicht richtig! Keine individuelle Rückmeldung.",
};

export default DropdownAnswer;
