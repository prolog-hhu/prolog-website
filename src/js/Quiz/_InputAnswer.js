class InputAnswer {
  constructor(el) {
    // save self DOM element (container, input, response), state handler
    this.answer = el;
    this.input = this.answer.querySelector("input");
    this.response = this.answer.querySelector(".response");

    this.state = null;
    this.responseContent = "";

    this.data = JSON.parse(this.input.dataset.answers);
  }

  updateState() {
    this.state = false;
    this.responseContent = "";

    for (const item of this.data) {
      let re = new RegExp(item["content"]);

      // positive correct match
      if (re.test(this.input.value) && item["correct"] == true) {
        this.state = true;
        return this.state;
      }
      // negativ correct match
      else if (!re.test(this.input.value) && item["correct"] == true) {
        this.state = false;
        this.responseContent += item["return"];
      }
      // negative incorrect match
      else if (re.test(this.input.value) && item["correct"] == false) {
        this.state = false;
        this.responseContent += item["return"];
      }
      // no match
      else {
        this.state = false;
      }
    }
    if (this.responseContent == "") {
      this.responseContent = config["DefaultResponseFalse"];
    }
    return this.state;
  }

  updateResponse() {
    if (this.state === true) {
      this.answer.classList.remove("errored");
    } else {
      this.answer.classList.add("errored");
      this.response.innerHTML = this.responseContent;
    }
  }
}

const config = {
  DefaultResponseFalse: "Nicht richtig! Keine individuelle Rückmeldung.",
};

export default InputAnswer;
