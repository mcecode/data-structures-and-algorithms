// Initial answer
// Does not pass the requirements since time complexity is not O(log(m+n))
// Time: O((m+n) log(m+n)) - Because V8 uses Timsort for 'Array.prototype.sort'
// https://v8.dev/blog/array-sort#timsort
// Space: O(m+n)
function findMedianSortedArrays(nums1: number[], nums2: number[]): number {
  const nums = [...nums1, ...nums2].sort((a, b) => b - a);
  const mid = nums.length / 2;

  if (nums.length % 2 === 0) {
    return (nums[mid - 1] + nums[mid]) / 2;
  } else {
    return nums[Math.floor(mid)];
  }
}

export default {
  funcs: [findMedianSortedArrays],
  tests: [
    // LeetCode examples
    { i: [[1, 3], [2]], o: 2 },
    {
      i: [
        [1, 2],
        [3, 4]
      ],
      o: 2.5
    },

    // Added test cases
    // Mixed arrangement
    {
      i: [
        [3, 5, 7, 9],
        [4, 6, 8, 10]
      ],
      o: 6.5
    },
    {
      i: [
        [4, 6, 8, 11],
        [3, 5, 7, 9, 10]
      ],
      o: 7
    },
    // Large value intervals
    {
      i: [
        [1, 138, 615, 845, 931],
        [38, 262, 487, 792]
      ],
      o: 487
    },
    {
      i: [
        [1, 138, 615, 845, 931],
        [38, 262, 487, 792, 1037]
      ],
      o: 551
    },
    // Zero and negative numbers
    {
      i: [
        [-237, -21, 64, 853],
        [-137, -6, -1, 0, 576]
      ],
      o: -1
    },
    {
      i: [
        [-237, -21, 0, 64, 466, 932],
        [-137, -6, -1, 576]
      ],
      o: -0.5
    },
    // Repeating values
    {
      i: [
        [7, 900, 1001, 2120],
        [-100, 2, 7, 900, 2120]
      ],
      o: 900
    },
    {
      i: [
        [7, 900, 1001, 2120, 6879],
        [-100, 2, 7, 900, 2120]
      ],
      o: 900
    }
  ]
};
