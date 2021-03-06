<!doctype html>
<title>Buttons</title>

<style>
body {
  font-size: 16px;
  font-family: sans-serif;
}
</style>

<h1>CSS Quiz</h1>

<p>Which symbol is used in id selectors?
<select id="options1">
  <option value="correct">#</option>
  <option>.</option>
  <option>*</option>
  <option>:</option>
</select>

<p>Which symbol is used in class selectors?
<select id="options2">
  <option>#</option>
  <option value="correct">.</option>
  <option>*</option>
  <option>:</option>
</select>

<p>Which symbol separates property names and values?
<select id="options3">
  <option>#</option>
  <option>.</option>
  <option>*</option>
  <option value="correct">:</option>
</select>

<p><button id="checkButton">Check Answers</button>

<script>

function checkAnswers() {
  var score = 0
  if (options1.value == 'correct') {
    options1.style.backgroundColor = 'lightGreen';
    score += 1;
  } else {
    options1.style.backgroundColor = 'pink';
  }
  
  if (options2.value == 'correct') {
    options2.style.backgroundColor = 'lightGreen';
    score += 1;
  } else {
    options2.style.backgroundColor = 'pink';
  }
  
  if (options3.value == 'correct') {
    options3.style.backgroundColor = 'lightGreen';
    score += 1;
  } else {
    options3.style.backgroundColor = 'pink';
  }
alert('Your scored ' + score + '/3');
}

checkButton.onclick = checkAnswers;
</script>