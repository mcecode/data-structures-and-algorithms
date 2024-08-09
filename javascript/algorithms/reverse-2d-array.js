import test from "../lib/test.js";

function createNew(array) {
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

function rotate1d(array) {
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
      const startElem = newArray[i][j];
      const endSubIndex = newArray[i].length - (j + 1);

      newArray[i][j] = newArray[i][endSubIndex];
      newArray[i][endSubIndex] = startElem;
    }

    const endIndex = newArray.length - (i + 1);
    if (i !== endIndex) {
      for (let j = 0; j < Math.floor(newArray[endIndex].length / 2); j++) {
        const startElem = newArray[endIndex][j];
        const endSubIndex = newArray[endIndex].length - (j + 1);

        newArray[endIndex][j] = newArray[endIndex][endSubIndex];
        newArray[endIndex][endSubIndex] = startElem;
      }

      const startArray = newArray[i];
      newArray[i] = newArray[endIndex];
      newArray[endIndex] = startArray;
    }
  }

  return newArray;
}

function rotate2d(array) {
  const newArray = structuredClone(array);
  const uniqueId = Symbol();

  for (let i = 0; i < Math.ceil(newArray.length / 2); i++) {
    const endIndex = newArray.length - (i + 1);

    if (i === endIndex) {
      for (let j = 0; j < newArray[i].length; j++) {
        newArray[i].splice(j, 0, newArray[i].pop());
      }

      break;
    }

    let startElem = uniqueId;
    let endElem = uniqueId;

    let startLen = newArray[i].length;
    let endLen = newArray[endIndex].length;
    const len = startLen > endLen ? startLen : endLen;
    for (let j = 0; j < len; j++) {
      if (startLen > 0) {
        startElem = newArray[i].shift();
        startLen--;
      }

      if (endLen > 0) {
        endElem = newArray[endIndex].pop();
        endLen--;
      }

      if (startElem !== uniqueId) {
        newArray[endIndex].unshift(startElem);
        startElem = uniqueId;
      }

      if (endElem !== uniqueId) {
        newArray[i].push(endElem);
        endElem = uniqueId;
      }
    }
  }

  return newArray;
}

function swap2d(array) {
  const newArray = structuredClone(array);
  const uniqueId = Symbol();

  for (let i = 0; i < Math.ceil(newArray.length / 2); i++) {
    const endIndex = newArray.length - (i + 1);

    if (i === endIndex) {
      for (let j = 0; j < Math.floor(newArray[i].length / 2); j++) {
        const startElem = newArray[i][j];
        const endSubIndex = newArray[i].length - (j + 1);

        newArray[i][j] = newArray[i][endSubIndex];
        newArray[i][endSubIndex] = startElem;
      }

      break;
    }

    let startElem = uniqueId;
    let endElem = uniqueId;

    let startSubIndex = 0;
    let endSubIndex = newArray[endIndex].length - 1;

    const startLen = newArray[i].length;
    const endLen = newArray[endIndex].length;
    const isStartGtEnd = startLen > endLen;
    const len = isStartGtEnd ? startLen : endLen;
    for (let j = 0; j < len; j++) {
      if (startSubIndex < startLen) {
        if (startSubIndex < endLen) {
          startElem = newArray[i][startSubIndex];
        } else {
          startElem = newArray[i][endLen];
          newArray[i].splice(endLen, 1);
        }
      }

      if (endSubIndex >= 0) {
        endElem = newArray[endIndex][endSubIndex];
      }

      if (startElem !== uniqueId) {
        if (isStartGtEnd) {
          newArray[endIndex][startLen - (startSubIndex + 1)] = startElem;
        } else {
          newArray[endIndex][endSubIndex] = startElem;
        }

        startElem = uniqueId;
      } else {
        newArray[endIndex].splice(endSubIndex, 1);
      }

      if (endElem !== uniqueId) {
        newArray[i][startSubIndex] = endElem;
        endElem = uniqueId;
      }

      startSubIndex++;
      endSubIndex--;
    }
  }

  return newArray;
}

test(
  import.meta.filename,
  [createNew, rotate1d, swap1d, rotate2d, swap2d],
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
      name: "Odd parent, jagged children, longer end",
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
      name: "Even parent, jagged children, longer start",
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
      name: "Single child, single element",
      input: [[0]],
      output: [[0]]
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
