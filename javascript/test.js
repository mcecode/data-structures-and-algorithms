import fs from "node:fs/promises";

for (const file of await fs.readdir("./algorithms")) {
  await import(`./algorithms/${file}`);
}
