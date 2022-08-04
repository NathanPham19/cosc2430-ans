students = []
const student_key = 'students'

loadStudent();

document.querySelector("#add_btn").addEventListener("click", function() {
  let stu = {
    id : document.querySelector("#id").value,
    name: document.querySelector("#name").value
  }
  students.push(stu);
  alert('Student added');
  saveStudent();
});

document.querySelector("#view_btn").addEventListener("click", function() {
  let msg = '';
  for (let s of students) {
    msg += ("\n" + s.id + " : " + s['name']);
  }
  alert(msg);
});

document.querySelector("#delete_btn").addEventListener("click", function() {
  let temp = [];
  let delete_id = document.querySelector("#id").value
  for (let s of students) {
    if (s.id != delete_id) {
      temp.push(s);
    }
  }
  students = temp;
  alert('Student deleted');
  saveStudent();
});

function saveStudent() {
  localStorage.setItem(student_key, JSON.stringify(students))
}

function loadStudent() {
  students = JSON.parse(localStorage.getItem(student_key));
  if (students == null) {
    students = [];
  }
}
