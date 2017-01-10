var change_pass = 0;

function show()
{
    if (change_pass==0)
    {
        document.getElementById("pass_block").style.display = "block";
        change_pass=1;
    }
    else
    {
        document.getElementById("pass_block").style.display = "none";
        change_pass=0;

    }
}

