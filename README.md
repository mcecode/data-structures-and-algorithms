# Data Structures and Algorithms

I like learning about programming languages, from their syntax to the concepts and paradigms they use. It helps give me a different perspective on the hows and whys of things, plus I just find them interesting overall. At the same time, I could be better at data structures and algorithms. So, when I have time and I feel like it, I'll be exploring languages and trying to improve on data structures and algorithms here. Thus, in the spirit of language exploration, I intend to only use the vanilla, base form of whatever language I will explore, meaning, no external and non-default libraries, even for testing.

## Disclaimer

**Do not use the code in this repository for anything other than educational purposes.**

I'll try to be as thorough as I can in testing, but since I'm primarily doing this for fun, there will probably be bugs and edge cases that I'll miss. Additionally, I intend to reinvent a lot of wheels for educational purposes. As such, if you are tempted to use anything here for a project, don't, just don't. Find and use a battle-tested library instead.

That said, if your goal is to play around and learn along with me, then feel free to clone or fork this repository and use it however you like.

## Directory structure

Each subdirectory maps to a programming language and contains a readme file that details instructions and requirements for running the code.

## Data structures

- Singly linked list ([Wikipedia](https://en.wikipedia.org/wiki/Linked_list#Singly_linked_list))
  - [PHP](php/LinkedLists/SinglyLinkedList.php)
  - [Go](go/linked_list/singly.go)
- Circular doubly linked list ([Wikipedia](https://en.wikipedia.org/wiki/Linked_list#Doubly_linked_list), [Wikipedia](https://en.wikipedia.org/wiki/Linked_list#Circular_linked_list))
  - [PHP](php/LinkedLists/CircularDoublyLinkedList.php)
  - [Go](go/linked_list/circular_doubly.go)
- Queue ([Wikipedia](<https://en.wikipedia.org/wiki/Queue_(abstract_data_type)>))
  - [Go](go/queue/queue.go)
- Stack ([Wikipedia](<https://en.wikipedia.org/wiki/Stack_(abstract_data_type)>))
  - [Go](go/stack/stack.go)

## Algorithms

- Ceasar cipher ([Wikipedia](https://en.wikipedia.org/wiki/Caesar_cipher))
  - [PHP](php/Ciphers/CeasarCipher.php)
- Palindrome checker ([Wikipedia](https://en.wikipedia.org/wiki/Palindrome))
  - [Go](go/strings/palindrome/palindrome.go)
- Hamming distance ([Wikipedia](https://en.wikipedia.org/wiki/Hamming_distance))
  - [Go](go/strings/hamming_distance/hamming_distance.go)

## LeetCode problems

- Two sum ([LeetCode](https://leetcode.com/problems/two-sum))
  - [TypeScript](typescript/leetcode/1-two-sum.ts)
- Add two numbers ([LeetCode](https://leetcode.com/problems/add-two-numbers))
  - [TypeScript](typescript/leetcode/2-add-two-numbers.ts)
- Longest substring without repeating characters ([LeetCode](https://leetcode.com/problems/longest-substring-without-repeating-characters))
  - [TypeScript](typescript/leetcode/3-longest-substring-without-repeating-characters.ts)
- Median of two sorted arrays ([LeetCode](https://leetcode.com/problems/median-of-two-sorted-arrays))
  - [TypeScript](typescript/leetcode/4-median-of-two-sorted-arrays.ts)

## Contributing

Since one of the main goals of this project is for me to learn data structures and algorithms, I won't accept pull requests that implement them because I want to do that myself. However, I would greatly appreciate suggestions on languages, data structures, and algorithms to explore as well as fixes or improvements to the things that I have already implemented.

## Inspiration

- [JavaScript Algorithms and Data Structures](https://github.com/trekhleb/javascript-algorithms)
- [The Algorithms](https://github.com/TheAlgorithms)

## License

Copyright 2022-present Matthew Espino

This project is licensed under the [Apache 2.0 license](LICENSE).
