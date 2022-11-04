// Initial answer
// O(n^4)
function lengthOfLongestSubstring(s: string): number {
  if (s.length < 2) {
    return s.length;
  }

  const lastCharIndex = s.length - 1;
  const lastChar = s[lastCharIndex];
  let len = 0;

  loop: for (let i = 0; i < s.length; i++) {
    for (let j = i + 1; j < s.length; j++) {
      for (let k = i; k < j; k++) {
        const isLastChar = j === lastCharIndex;

        if (s[k] === s[j] || isLastChar) {
          if (isLastChar) {
            j = s.length;

            for (let l = i; l < lastCharIndex; l++) {
              if (s[l] === lastChar) {
                j = lastCharIndex;
                break;
              }
            }
          }

          if (j - i > len) {
            len = j - i;
          }

          continue loop;
        }
      }
    }
  }

  return len;
}

export default {
  funcs: [lengthOfLongestSubstring],
  tests: [
    // LeetCode examples
    { i: ["abcabcbb"], o: 3 },
    { i: ["bbbbb"], o: 1 },
    { i: ["pwwkew"], o: 3 },

    // Added test cases
    // Empty
    { i: [""], o: 0 },
    // Single character
    { i: ["a"], o: 1 },
    // All unique characters
    { i: ["abcdefg"], o: 7 },
    // Repeat middle character; 'b' in 'abbbca'; Answer: 'bca', 'cab', or 'abc'
    { i: ["abbbcabcbb"], o: 3 },
    // Separate repeat middle character; 'b' in 'abcba'; Answer: 'abc' or 'cba'
    { i: ["abcbabcbb"], o: 3 },
    // No repeat start of answer; 'a' in 'abcde'; Answer: 'abcde'
    { i: ["abcabcde"], o: 5 },
    // No repeat start of answer, repeat last character; 'e' in 'abcdee';
    // Answer: 'abcde'
    { i: ["abcabcdee"], o: 5 },
    // No repeat start of answer, repeat last character in middle;
    // 'e' in 'abecde'; Answer: 'abecd'
    { i: ["abcabecde"], o: 5 },
    // Use digits, symbols, and spaces; Answer: '123 !@#$%^&'
    { i: ["123 !@#$%^& 123"], o: 11 }
  ]
};
