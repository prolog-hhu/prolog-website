class InputAnswer {
  constructor(el) {
    // save self DOM element (container, input), state handler
    this.answer = el;
    this.input = this.answer.querySelector("input");

    this.state = null;
  }

  updateState() {
    console.log("Todo");
    return true;
  }

  updateResponse() {
    if (this.state === true) {
      this.answer.classList.remove("errored");
    } else {
      this.answer.classList.add("errored");
    }
  }
}

export default InputAnswer;
