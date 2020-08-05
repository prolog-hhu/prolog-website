class DropdownAnswer {
  constructor(el) {
    // save self DOM element (container, input, response), state handler
    this.answer = el;
    this.select = this.answer.querySelector("select");
    this.response = this.answer.querySelector(".response");

    this.state = null;
  }

  updateState() {
    if (
      this.select.options[this.select.selectedIndex].hasAttribute("correct")
    ) {
      this.state = true;
    } else {
      this.state = false;
    }

    return this.state;
  }

  updateResponse() {
    if (this.state === true) {
      this.answer.classList.remove("errored");
      this.response.innerHTML = "";
    } else {
      this.answer.classList.add("errored");

      let responseContent = this.select.options[this.select.selectedIndex]
        .dataset.return;

      if (responseContent != undefined) {
        this.response.innerHTML = responseContent;
      } else if (responseContent == "") {
        this.response.innerHTML = config["DefaultResponseFalse"];
      }
    }
  }
}

const config = {
  DefaultResponseFalse: "Nicht richtig! Keine individuelle Rückmeldung.",
};

export default DropdownAnswer;
