class ChoiceAnswer {
  constructor(el) {
    // save self DOM element (container, input), state handler
    this.answer = el;
    this.input = this.answer.querySelector("input");

    this.state = null;
  }

  updateState() {
    if (
      this.input.checked == true && //
      this.input.hasAttribute("correct")
    ) {
      this.state = true;
    } else if (
      this.input.checked == false && //
      this.input.hasAttribute("incorrect")
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
    } else {
      this.answer.classList.add("errored");
    }
  }
}

export default ChoiceAnswer;
