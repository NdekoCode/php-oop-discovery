const insultes = [
  "con",
  "connard",
  "baiseur",
  "putain",
  "chier",
  "merde",
  "pute",
];
let sentence = "Comment va ce baiseur de con de pute";
for (let word of insultes) {
  const str = word[0] + "*".repeat(word.length - 1);
  sentence = sentence.replace(word, str);
}
console.log(sentence);
