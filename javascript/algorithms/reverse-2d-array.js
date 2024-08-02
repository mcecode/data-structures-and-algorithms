import test from "../lib/test.js";

function reverseFromStartToEnd(array) {
  const newArray = [];

  for (let i = 0; i < array.length; i++) {
    const newSubArray = [];

    for (let j = 0; j < array[i].length; j++) {
      newSubArray[array[i].length - (j + 1)] = array[i][j];
    }

    newArray[array.length - (i + 1)] = newSubArray;
  }

  return newArray;
}

function reverseFromEndToStart(array) {
  const newArray = [];

  for (let i = array.length - 1; i >= 0; i--) {
    const newSubArray = [];

    for (let j = array[i].length - 1; j >= 0; j--) {
      newSubArray[array[i].length - (j + 1)] = array[i][j];
    }

    newArray[array.length - (i + 1)] = newSubArray;
  }

  return newArray;
}

function rearrangeFromStartToEnd(array) {
  const newArray = structuredClone(array);

  for (let i = newArray.length - 1; i >= 0; i--) {
    newArray.splice(i, 0, newArray.shift());

    for (let j = newArray[i].length - 1; j >= 0; j--) {
      newArray[i].splice(j, 0, newArray[i].shift());
    }
  }

  return newArray;
}

function rearrangeFromEndToStart(array) {
  const newArray = structuredClone(array);

  for (let i = 0; i < newArray.length; i++) {
    newArray.splice(i, 0, newArray.pop());

    for (let j = 0; j < newArray[i].length; j++) {
      newArray[i].splice(j, 0, newArray[i].pop());
    }
  }

  return newArray;
}

function swap1d(array) {
  const newArray = structuredClone(array);

  for (let i = 0; i < Math.ceil(newArray.length / 2); i++) {
    for (let j = 0; j < Math.floor(newArray[i].length / 2); j++) {
      const tempStartElem = newArray[i][j];
      const endSubIndex = newArray[i].length - (j + 1);

      newArray[i][j] = newArray[i][endSubIndex];
      newArray[i][endSubIndex] = tempStartElem;
    }

    const endIndex = newArray.length - (i + 1);
    if (i !== endIndex) {
      for (let j = 0; j < Math.floor(newArray[endIndex].length / 2); j++) {
        const tempStartElem = newArray[endIndex][j];
        const endSubIndex = newArray[endIndex].length - (j + 1);

        newArray[endIndex][j] = newArray[endIndex][endSubIndex];
        newArray[endIndex][endSubIndex] = tempStartElem;
      }

      const tempStartArray = newArray[i];
      newArray[i] = newArray[endIndex];
      newArray[endIndex] = tempStartArray;
    }
  }

  return newArray;
}

test(
  import.meta.filename,
  [
    reverseFromStartToEnd,
    reverseFromEndToStart,
    rearrangeFromStartToEnd,
    rearrangeFromEndToStart,
    swap1d
  ],
  [
    {
      name: "Odd parent, even children",
      input: [
        [1, 2, 3, 4, 5, 6],
        [7, 8, 9, 10, 11, 12],
        [13, 14, 15, 16, 17, 18]
      ],
      output: [
        [18, 17, 16, 15, 14, 13],
        [12, 11, 10, 9, 8, 7],
        [6, 5, 4, 3, 2, 1]
      ]
    },
    {
      name: "Even parent, odd children",
      input: [
        [1, 2, 3, 4, 5, 6, 7],
        [8, 9, 10, 11, 12, 13, 14],
        [15, 16, 17, 18, 19, 20, 21],
        [22, 23, 24, 25, 26, 27, 28]
      ],
      output: [
        [28, 27, 26, 25, 24, 23, 22],
        [21, 20, 19, 18, 17, 16, 15],
        [14, 13, 12, 11, 10, 9, 8],
        [7, 6, 5, 4, 3, 2, 1]
      ]
    },
    {
      name: "Odd parent, jagged children",
      input: [
        [1, 2, 3, 4, 5, 6, 7],
        [8, 9, 10, 11, 12, 13],
        [14, 15, 16, 17, 18, 19, 20, 21, 22]
      ],
      output: [
        [22, 21, 20, 19, 18, 17, 16, 15, 14],
        [13, 12, 11, 10, 9, 8],
        [7, 6, 5, 4, 3, 2, 1]
      ]
    },
    {
      name: "Even parent, jagged children",
      input: [
        [1, 2, 3, 4, 5, 6],
        [7, 8, 9, 10, 11, 12, 13, 14, 15],
        [16, 17, 18, 19, 20, 21, 22, 23],
        [24, 25, 26]
      ],
      output: [
        [26, 25, 24],
        [23, 22, 21, 20, 19, 18, 17, 16],
        [15, 14, 13, 12, 11, 10, 9, 8, 7],
        [6, 5, 4, 3, 2, 1]
      ]
    },
    {
      name: "Single child",
      input: [[1, 2, 3, 4, 5]],
      output: [[5, 4, 3, 2, 1]]
    },
    {
      name: "Different data types",
      input: [
        ["a", null, true],
        ["b", false]
      ],
      output: [
        [false, "b"],
        [true, null, "a"]
      ]
    }
  ]
);
