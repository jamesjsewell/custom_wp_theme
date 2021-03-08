
const testingEs6 = async () => {
  let bar = { testing: "testing "}
  const { testing } = bar
  console.log(testing)
  const num1 = 500
  console.log(`${num1} is the number`)
}
testingEs6()
