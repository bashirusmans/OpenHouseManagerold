
var attendancebtns = document.getElementsByClassName("attendancebtn");
if(attendancebtns){
    for(i=0; i<attendancebtns.length; i++){
        attendancebtns[i].addEventListener('click',function(){
            if(this.textContent=="Present"){
                this.classList.remove('btn-success');
                this.classList.add('btn-danger');
                this.textContent="Absent"
                document.getElementById('check').checked = false;
            }
            else{
                this.classList.remove('btn-danger');
                this.classList.add('btn-success');
                this.textContent="Present"
                document.getElementById('check').checked = true;
            }
        })
    }
}

