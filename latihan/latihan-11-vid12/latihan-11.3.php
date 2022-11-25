<!DOCTYPE html>
<html>
<head>
    <title>Zodiak</title>
    <style>
        input {width: 100px;}
    </style>
</head>
<body>
    <form method="post" action="">
        <input type="number" name="bulan" min="1" max="12" placeholder="Bulan Lahir"><br>
        <input type="number" name="tanggal" min="1" max="31" placeholder="Tanggal Lahir"><br>
        <button type="submit" name="submit">Cek Zodiak</button>
    </form>

    <hr>

    <?php
        if (isset($_POST["submit"]))
        {
            switch ($_POST["bulan"])
            {
                case 1: // Januari
                    if($_POST["tanggal"] >= 1 && $_POST["tanggal"] <= 19)
                    {
                        echo "Capricorn";

                    }
                    else if($_POST["tanggal"] >= 20 && $_POST["tanggal"] <= 31)
                    {
                        echo "Aquarius";
                    }
                    else
                    {
                        echo "Tanggal Lahir Invalid!";
                    }
                    break;

                case 2: // Februari
                    if($_POST["tanggal"] >= 1 && $_POST["tanggal"] <= 18)
                    {
                        echo "Aquarius";
                    }
                    else if($_POST["tanggal"] >= 19 && $_POST["tanggal"] <= 29)
                    {
                        echo "Pisces";
                    } 
                    else
                    {
                        echo "Tanggal Lahir Invalid!";
                    }
                    break;

                case 3: // Maret
                    if($_POST["tanggal"] >= 1 && $_POST["tanggal"] <= 20)
                    {
                        echo "Pisces";
                    }
                    else if($_POST["tanggal"] >= 21 && $_POST["tanggal"] <= 31)
                    {
                        echo "Aries";
                    }
                    else
                    {
                        echo "Tanggal Lahir Invalid!";
                    }
                    break;

                case 4: // April
                    if($_POST["tanggal"] >= 1 && $_POST["tanggal"] <= 20)
                    {
                        echo "Aries";
                    }
                    else if($_POST["tanggal"] >= 21 && 30)
                    {
                        echo "Taurus";
                    }
                    else
                    {
                        echo "Tanggal Lahir Invalid!";
                    }
                    break;

                case 5: // Mei
                    if($_POST["tanggal"] >= 1 && $_POST["tanggal"] <= 20)
                    {
                        echo "Taurus";
                    }else if($_POST["tanggal"] >= 21 && $_POST["tanggal"] <= 31)
                    {
                        echo "Gemini";
                    }
                    else
                    {
                        echo "Tanggal Lahir Invalid!";
                    }
                    break;

                case 6: // Juni
                    if($_POST["tanggal"] >= 1 && $_POST["tanggal"] <= 20)
                    {
                        echo "Gemini";
                    }
                    else if($_POST["tanggal"] >= 21 && $_POST["tanggal"] <= 30)
                    {
                        echo "Cancer";
                    }
                    else
                    {
                        echo "Tanggal Lahir Invalid!";
                    }
                    break;

                case 7: // Juli
                    if($_POST["tanggal"] >= 1 && $_POST["tanggal"] <= 20)
                    {
                        echo "Cancer";
                    }
                    else if($_POST["tanggal"] >= 21 && $_POST["tanggal"] <= 31)
                    {
                        echo "Leo";
                    }else 
                    {
                        echo "Tanggal Lahir Invalid!";
                    }
                    break;

                case 8: // Agustus
                    if($_POST["tanggal"] >= 1 && $_POST["tanggal"] <= 21)
                    {
                        echo "Leo";
                    }
                    else if($_POST["tanggal"] >= 22 && $_POST["tanggal"] <= 31)
                    {
                        echo "Virgo";
                    }
                    else
                    {
                        echo "Tanggal Lahir Invalid!";
                    }
                    break;

                case 9: // September
                    if($_POST["tanggal"] >= 1 && $_POST["tanggal"] <= 22)
                    {
                        echo "Virgo";
                    }
                    else if($_POST["tanggal"] >= 23 && $_POST["tanggal"] <= 30)
                    {
                        echo "Libra";
                    }
                    else
                    {
                        echo "Tanggal Lahir Invalid!";
                    }
                    break;

                case 10: // Oktober
                    if($_POST["tanggal"] >= 1 && $_POST["tanggal"] <= 22)
                    {
                        echo "Libra";
                    }
                    else if($_POST["tanggal"] >= 23 && $_POST["tanggal"] <= 31)
                    {
                        echo "Scorpio";
                    }
                    else
                    {
                        echo "Tanggal Lahir Invalid!";
                    }
                    break;

                case 11: // November
                    if($_POST["tanggal"] >= 1 && $_POST["tanggal"] <= 22)
                    {
                        echo "Scorpio";
                    } 
                    else if($_POST["tanggal"] >= 23 && $_POST["tanggal"] <= 30)
                    {
                        echo "Sagitarius";
                    }
                    else
                    {
                        echo "Tanggal Lahir Invalid!";
                    }
                    break;

                case 12: // Desember
                    if($_POST["tanggal"] >= 1 && $_POST["tanggal"] <= 20)
                    {
                        echo "Sagitarius";
                    }
                    else if($_POST["tanggal"] >= 21 && $_POST["tanggal"] <= 31)
                    {
                        echo "Capricorn";
                    }
                    else
                    {
                        echo "Tanggal Lahir Invalid!";
                    }
                    break;

                default:
                    echo "Bulan Lahir Invalid";
            }
        }
    ?>
</body>
</html>