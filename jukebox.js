let volume = 0.02;
const jukeboxDiv = document.querySelector(".jukebox")
const musicSelection =
    [
        ['On Our Way - Square Enix', new Audio('media/sfx/bgm1.mp3')]
    ]

function playSound(sound){
    sound.volume = volume;
    sound.play();
}
setInterval(() => {
    if (document.querySelector(".homescreen").style.display == "block")
    {
        playSound(musicSelection[0][1]);
    }
}, "2500");