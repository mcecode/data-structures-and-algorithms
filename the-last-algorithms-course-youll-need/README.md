# The Last Algorithms Course You'll Need

My notes for [ThePrimeagen's course](https://frontendmasters.com/courses/algorithms) at Frontend Masters.

## Big O

### What

- It categorizes your algorithm on time or memory based on the input.
- A generalized way to understand how an algorithm will react as its input grows.
- Said another way, as your input grows, how fast does computation or memory grow?
- It's not meant to be an exact measurement.

### Why

- It can help you decide on what data structure or algorithm you should use and why, based on your requirements and their constraints, as performance can suffer if data structures and algorithms are used incorrectly.
- Choosing the right data structure and algorithm can greatly help you in making the best program.

### Important Concepts

#### Growth Is with Respect to the Input

- Of course, in the real world, memory growing is not computationally free as it takes time to allocate or create memory. Other factors like garbage collection also play a role in the real world. However, those are not considered when theoretically thinking about algorithms.

#### Constants Are Dropped

- This is because what's being described is not the exact time or how many CPU units are used, but how the algorithm grows, so $O(2n)$ or $O(10n)$ just becomes $O(n)$.
- Practically, constants are important, theoretically, they are not. As a case in point, practically speaking, $O(n^2)$ may be faster than $O(n)$ for smaller inputs. For example, if $n = 1000$, $O(10n) = 10,000$ and $O(n^2) = 1,000,000$, however, if $n = 5$, $O(10n) = 50$ and $O(n^2) = 25$.

#### Worst Case Is _Usually_ the Way We Measure

- For example, when you're going over a data structure and there's a case where you can end early because of a condition, you should assume that that condition could only be true for the last item of the data structure.

### Common Time Complexities

![Big O complexity chart](https://raw.githubusercontent.com/ThePrimeagen/fem-algos/main/public/images/big-o-face.png)

- $O(1)$
  - This is considered constant time as you would always do the same set of operations no matter how big the input is.
  - Example: Hash map lookups
- $O(log n)$
  - Visualization: Think of looping over a data structure like in $O(n)$, but after every iteration the amount of items that need to be gone over lessens.
  - Example: Binary search trees
- $O(n)$
  - The algorithm grows linearly based on the input.
  - Visualization: Think of looping over every item of a data structure.
- $O(n log n)$
  - Visualization: Think of a loop within a loop like in $O(n^2)$, but after every iteration of the outer loop the amount of items the need to be gone over in the inner loop lessens.
  - Example: Quicksort
- $O(n^2)$
  - Visualization: Think of a loop within a loop when going over every item of a data structure.
- $O(n^3)$
  - Visualization: Think of a loop within a loop within a loop when going over every item of a data structure.
- $O(2^n)$ and $O(n!)$
  - These can't be run practically on traditional computers, but might be runnable practically on quantum computers.

## Links

- <https://github.com/ThePrimeagen/fem-algos>
- <https://github.com/ThePrimeagen/fem-algos-2>

## License

Like the [source material](https://theprimeagen.github.io/fem-algos), this file and its contents are licensed under the [Creative Commons Attribution-NonCommercial 4.0 International Public License](https://creativecommons.org/licenses/by-nc/4.0).
