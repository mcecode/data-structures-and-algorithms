function isEqual(v1: any, v2: any): boolean {
  if (typeof v1 === "object" && typeof v2 === "object") {
    // Using 'JSON.stringify' to compare objects has its problems but it works
    // well for now.
    if (JSON.stringify(v1) !== JSON.stringify(v2)) {
      return false;
    }

    return true;
  }

  return Object.is(v1, v2);
}

type Result = [boolean, string][];
function test({
  funcs,
  tests
}: {
  funcs: [(...args: any) => any];
  tests: { i: any[]; o: any }[];
}): Result {
  const result: Result = [];

  for (const func of funcs) {
    let passed = true;

    for (const { i, o: expected } of tests) {
      const actual = func(...i);

      if (!isEqual(actual, expected)) {
        passed = false;
        break;
      }
    }

    result.push([passed, func.name]);
  }

  return result;
}

async function run(fileName: string) {
  const { default: problem } = await import(`./leetcode/${fileName}`);

  let output = `LeetCode Problem ${fileName.split("-")[0]}:`;
  let allPassed = true;

  for (const [passed, name] of test(problem)) {
    if (passed) {
      output += ` ✅ ${name}`;
      continue;
    }

    output += ` ❌ ${name}`;
    allPassed = false;
  }

  if (allPassed) {
    console.log(`✅ ${output}`);
    return;
  }

  console.log(`❌ ${output}`);
}

if (Deno.args.length > 0) {
  for (const path of Deno.args) {
    await run(path.split(/[\\/]/).at(-1));
  }

  Deno.exit();
}

for await (const entry of Deno.readDir("./leetcode")) {
  if (entry.isFile) {
    await run(entry.name);
  }
}
