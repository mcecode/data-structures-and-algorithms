import assert from "node:assert";
import path from "node:path";
import util from "node:util";

const rootDir = path.dirname(import.meta.dirname) + "/";

/**
 * @param {string} filename `import.meta.filename`
 * @param {((param: any) => any)[]} funcs
 * @param {{name: string; input: any; output: any}[]} tests
 */
export default function test(filename, funcs, tests) {
  console.log("➡️ ", filename.replace(rootDir, ""));

  for (const func of funcs) {
    let passed = true;
    const failData = [];

    for (const { name, input, output } of tests) {
      try {
        assert.deepStrictEqual(func(input), output);
      } catch ({ expected, actual }) {
        passed = false;
        failData.push({ name, expected, actual });
      }
    }

    if (passed) {
      console.log("  ✅ ", func.name);
      continue;
    }

    console.log("  ❌ ", func.name);
    for (const { name, expected, actual } of failData) {
      console.log("    ▶️ ", name);
      console.log(
        "      Expected: ",
        util
          .inspect(expected, { depth: Infinity, colors: true })
          .replace(/\n/g, "\n      ")
      );
      console.log(
        "      Actual: ",
        util
          .inspect(actual, { depth: Infinity, colors: true })
          .replace(/\n/g, "\n      ")
      );
    }
  }

  console.log();
}
