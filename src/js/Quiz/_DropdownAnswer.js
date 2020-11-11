import Answer from "./_Answer";

export default class DropdownAnswer extends Answer {
  constructor(obj) {
    super(obj, "select", ".response");
  }

  updateState() {
    let selectedID = this.interaction.selectedIndex;

    if (this.interaction.options[selectedID].hasAttribute("correct")) {
      this.state = true;
      this.responseContent = "";
    } else {
      this.state = false;
      this.responseContent = this.interaction.options[
        selectedID
      ].dataset.return;
    }
    return this.state;
  }

  solve() {
    let idx;

    for (let i = 0; i < this.interaction.options.length; i++) {

        if (this.interaction.options[i].hasAttribute("correct")) {
            idx = i;
            break;
        }
    }

    this.interaction.selectedIndex = idx
  }
}
