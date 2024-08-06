let taille = document.getElementById("taille");
let formTaille = document.getElementById("formTaille");

taille.addEventListener("change", (e) => {
  formTaille.submit();
})

function selectEtoileA(aEtoiles, bUnselect, iNote, sClassSlelected) {
  for (let h = 0; h < aEtoiles.length; h++) {
    let oClass = aEtoiles[h].classList;
    if (bUnselect == false && h <= iNote - 1) {
      oClass.add(sClassSlelected);
    } else {
      oClass.remove(sClassSlelected);
    }
  }
}

function selectEtoileTemp(oEvent) {
  let oEl = oEvent.currentTarget, oFormExempleA = oEl.parentNode, aEtoilesExempleA = oFormExempleA.getElementsByClassName('etoile'), sClassSlelected = 'gold';
  selectEtoileA(aEtoilesExempleA, false, (oEvent.type == 'mouseleave') ? oFormExempleA.note.value : oEl.iNote, sClassSlelected);
}


document.addEventListener('DOMContentLoaded',function(){

let oFormExempleA = document.forms["etoileNote"],
  aEtoilesExempleA = oFormExempleA.getElementsByClassName('etoile');
for (let i = 0; i < aEtoilesExempleA.length; i++) {
  aEtoilesExempleA[i].iNote = i + 1;
  aEtoilesExempleA[i].addEventListener('mouseleave', selectEtoileTemp);
  aEtoilesExempleA[i].addEventListener('mouseenter', selectEtoileTemp);
  aEtoilesExempleA[i].addEventListener('click', function (oEvent) {
    let oEl = oEvent.currentTarget,
      sClassSlelected = 'gold',
      hasClass = oEl.classList.contains(sClassSlelected),
      bUnselect = hasClass && oEl.iNote == 1 && oFormExempleA.note.value == 1;
    oFormExempleA.note.value = bUnselect ? 0 : oEl.iNote;
    selectEtoileA(aEtoilesExempleA, bUnselect, oEl.iNote, sClassSlelected);
  });
  if (oFormExempleA.note.value - 1 == i) {
    aEtoilesExempleA[i].click();
  }
}
});

document.addEventListener('DOMContentLoaded',function(){
  
let formA = document.forms["etoileNote1"],
  etoileA = formA.getElementsByClassName('etoile1');
sClassSlelected = 'gold';

selectEtoileA(etoileA, false, formA.note1.value, sClassSlelected)




let concatest = document.querySelectorAll('.etoiles');


for (k = 0; k < concatest.length; k++) {
  let l = concatest[k].id,
    formComment = document.forms["etoileNote" + l],
    etoileB = formComment.getElementsByClassName('etoile' + l);
  selectEtoileA(etoileB, false, formComment.note2.value, sClassSlelected)
}

});



