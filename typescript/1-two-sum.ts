// Initial answer
// O(n^2)
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
// O(n)
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
