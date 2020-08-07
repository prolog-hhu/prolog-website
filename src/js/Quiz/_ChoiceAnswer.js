import Answer from "./_Answer";

export default class ChoiceAnswer extends Answer {
  constructor(obj) {
    super(obj, "input", undefined);
  }

  updateState() {
    if (
      this.interaction.checked == true && //
      this.interaction.hasAttribute("correct")
    ) {
      this.state = true;
    } else if (
      this.interaction.checked == false && //
      this.interaction.hasAttribute("incorrect")
    ) {
      this.state = true;
    } else {
      this.state = false;
    }
    return this.state;
  }
}
