var panel;
var t1panel;
var t2panel;
var t3panel;
var notespanel;
var transcriptpanel; //Transript panel
var cnpanel;  //cultural notes panel

window.onload = function(){
  panel = document.getElementById("popout");
  t1panel = document.getElementById("t1-panel");
  t2panel = document.getElementById("t2-panel");
  t3panel = document.getElementById("t3-panel");
  notespanel = document.getElementById("notes-panel");
  transcriptpanel = document.getElementById("transcript-panel");
  cnpanel = document.getElementById("cultural-notes-panel");
}

//Used to keep track of what is visible or not
var openPanel = false;
var openT1 = false;
var openT2 = false;
var openT3 = false;
var openNotes = false;
var openTranscript = false; //Transcripts
var openCn = false; //Cultural Notes

function toggleMenu(toggle){
  if (openPanel == false){
        //If the menu is closed
        openPanel = true;
        panel.style.right = "0px";
    }

    //Changes whats on the panel
    if(toggle == 1){
      if(openT1 === true){
        closePanel();
      } else {
        toggleClose();
        openT1 = true;
        t1panel.style.display = 'block';
        t1panel.style.zIndex = "9999";
      }
    } else if (toggle == 2){
      if(openT2 === true){
        closePanel();
      } else {
        toggleClose();
        openT2 = true;
        t2panel.style.display = 'block';
        t2panel.style.zIndex = "9999";
      }
    }else if (toggle == 3){
      if(openT3 === true){
        closePanel();
      } else {
        toggleClose();
        openT3 = true;
        t3panel.style.display = 'block';
        t3panel.style.zIndex = "9999";
      }
    } else if (toggle == 4){
      if(openNotes === true){
        closePanel();
      } else {
        toggleClose();
        openNotes = true;
        notespanel.style.display = 'block';
        notespanel.style.zIndex = "9999";
      }
    } else if (toggle == 5){
      if(openTranscript === true){
        closePanel();
      } else {
        toggleClose();
        transcript = true;
        transcriptpanel.style.display = 'block';
        transcriptpanel.style.zIndex = "9999";
      }
    } else if (toggle == 6){
      if(openCn === true){
        closePanel();
      } else {
        toggleClose();
        openCn = true;
        cnpanel.style.display = 'block';
        cnpanel.style.zIndex = "9999";
      }
    }
}

function closePanel(){
  //Closes everything
  openPanel = false;
  panel.style.right = "-618px";
  toggleClose();
}

function toggleClose(){
  //closes the panel 'content'
  t1panel.style.display = "none";
  t1panel.style.zIndex = "-1";
  t2panel.style.display = "none";
  t2panel.style.zIndex = "-1";
  t3panel.style.display = "none";
  t3panel.style.zIndex = "-1";
  notespanel.style.display = "none";
  notespanel.style.zIndex = "-1";
  transcriptpanel.style.display = "none";
  transcriptpanel.style.zIndex = "-1";
  cnpanel.style.display = "none";
  cnpanel.style.zIndex = "-1";
  openT1 = false;
  openT2 = false;
  openT3 = false;
  openNotes = false;
  openTranscript = false;
  openCn = false;
}

//Transcript panel: to change the language of the transcript, put it in where
var engTranscript = document.getElementById("english-pane");
var frTranscript = document.getElementById("french-pane");
var frLabel = document.getElementById("frLabel");
var engLabel = document.getElementById("engLabel");
var bothLabel = document.getElementById("bothLabel");

function removeAllSelected(){
  frLabel.classList.remove("selected");
  engLabel.classList.remove("selected");
  bothLabel.classList.remove("selected");
}

function toEnglish(){
  engTranscript.style.display = "block";
  frTranscript.style.display = "none";
  removeAllSelected();
  engLabel.classList.add("selected");
}

function toFrench(){
  engTranscript.style.display = "none";
  frTranscript.style.display = "block";
  removeAllSelected();
  frLabel.classList.add("selected");
}

function toBoth(){
  engTranscript.style.display = "block";
  frTranscript.style.display = "block";
  removeAllSelected();
  bothLabel.classList.add("selected");
}
