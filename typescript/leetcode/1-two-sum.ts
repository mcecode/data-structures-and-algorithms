// Initial answer
// Time: O(n^2)
// Space: O(1)
function twoSum(nums: number[], target: number): number[] {
  for (let i = 0; i < nums.length; i++) {
    for (let j = i + 1; j < nums.length; j++) {
      if (nums[i] + nums[j] === target) {
        return [i, j];
      }
    }
  }

  return [];
}

// Follow-up question answer
// Time: O(n)
// Space: O(n)
function twoSumV2(nums: number[], target: number): number[] {
  const m = new Map();

  for (let i = 0; i < nums.length; i++) {
    const sub = target - nums[i];

    if (m.has(sub)) {
      return [m.get(sub), i];
    }

    m.set(nums[i], i);
  }

  return [];
}

export default {
  funcs: [twoSum, twoSumV2],
  tests: [
    // LeetCode examples
    { i: [[2, 7, 11, 15], 9], o: [0, 1] },
    { i: [[3, 2, 4], 6], o: [1, 2] },
    { i: [[3, 3], 6], o: [0, 1] },

    // Added test cases
    // Change positions of example one
    { i: [[11, 7, 15, 2], 9], o: [1, 3] },
    // Negatives
    { i: [[-99, -6, -3, -2, -4], -8], o: [1, 3] },
    // Mix negatives and positives
    { i: [[-2, 6, 3, -4], 1], o: [0, 2] },
    // Zero target
    { i: [[-2, -6, 2, 5], 0], o: [0, 2] },
    // Max largest
    { i: [[1, 2, 1e9, 0, 7], 1e9], o: [2, 3] },
    // Max smallest
    { i: [[1, 2, -1e9, 0, 7], -1e9], o: [2, 3] }
  ]
};
