<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Buku</title>
    <style>
    /* Basic reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #1e1e2f, #4b0082);
        color: #ececec;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 20px;
    }

    .book-list {
        width: 100%;
        max-width: 900px;
        background-color: #2b2b3a;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    h2 {
        font-size: 2rem;
        color: #b19cd9; /* Light purple for headings */
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        overflow: hidden;
        border-radius: 12px;
        background-color: #333;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #444;
        color: #ddd;
    }

    th {
        background: #4b0082;
        color: #ffffff;
        font-weight: bold;
        text-transform: uppercase;
    }

    td {
        background: #2f2f3f;
    }

    tr:hover td {
        background-color: #4b0082;
        color: #ececec;
        transition: background 0.3s, color 0.3s;
    }

    /* Button styling */
    .back-btn {
        display: inline-block;
        margin-top: 20px;
        padding: 12px 25px;
        background: linear-gradient(135deg, #6a0dad, #4b0082);
        color: #fff;
        text-decoration: none;
        border-radius: 10px;
        font-weight: bold;
        text-transform: uppercase;
        transition: background 0.4s, transform 0.2s;
    }

    .back-btn:hover {
        background: linear-gradient(135deg, #8a2be2, #6a0dad);
        transform: scale(1.05);
        color: #fff;
    }

    /* Spacing for multiple buttons */
    .back-btn + .back-btn {
        margin-left: 15px;
    }

    /* Responsive styling */
    @media (max-width: 768px) {
        body {
            padding: 10px;
        }
        .book-list {
            padding: 20px;
        }
        th, td {
            padding: 10px;
            font-size: 0.9rem;
        }
        h2 {
            font-size: 1.5rem;
        }
        .back-btn {
            padding: 10px 20px;
            font-size: 0.9rem;
        }
    }
</style>

</head>
<body>

<div class="book-list">
    <h2>Senarai Buku</h2>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Buku</th>
                <th>Penerbit</th>
                <th>Tarikh</th>
                <th>Pengarang</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Contoh data buku (boleh diambil dari database)
                $books = [
                    ['id' => 1, 'nama' => 'Firewall Fundamentals', 'publisher' => 'IndianaPolis ; Cisco , Press', 'date' => '2021-07-15', 'author' => 'Noonan,Wesley J'],
                    ['id' => 2, 'nama' => 'Mastering Internet', 'publisher' => 'Venton Publising', 'date' => '2020-11-20', 'author' => 'Iskandar Ab Rashid Zaitun Ismail'],
                    ['id' => 3, 'nama' => 'Code Complete', 'publisher' => 'Addison-Wesley', 'date' => '1968-01-01', 'author' => 'Donald Knuth'],
                    ['id' => 4, 'nama' => 'Eloquent JavaScript', 'publisher' => 'No Starch Press', 'date' => '2018-12-04', 'author' => 'Marijn Haverbeke'],
                    ['id' => 5, 'nama' => 'Introduction to Algorithms', 'publisher' => 'MIT Press', 'date' => '2009-07-31 ', 'author' => 'Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, Clifford Stein'],
                    ['id' => 6, 'nama' => 'Python Crash Course', 'publisher' => 'No Starch Press', 'date' => '2015-11-01', 'author' => 'Eric Matthes'],
                    ['id' => 7, 'nama' => 'The Art of Computer Programming', 'publisher' => 'Addison-Wesley', 'date' => '1968-01-01', 'author' => 'Donald Knuth'],
                    ['id' => 8, 'nama' => 'Design Patterns: Elements of Reusable Object-Oriented Software', 'publisher' => 'Addison-Wesley', 'date' => '1994-10-31', 'author' => 'Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides'],
                    ['id' => 9, 'nama' => 'The Elegant Universe', 'publisher' => 'W. W. Norton & Company', 'date' => '1999-10-11', 'author' => 'Brian Greene'],
                    ['id' => 10, 'nama' => 'A Brief History of Time', 'publisher' => 'Bantam Books', 'date' => ' 1988-04-01', 'author' => 'Stephen Hawking'],
                    ['id' => 11, 'nama' => 'The Origin of Species', 'publisher' => 'John Murray', 'date' => '1859-11-24', 'author' => 'Charles Darwin'],
                    ['id' => 12, 'nama' => 'The Art of War', 'publisher' => 'Oxford University Press', 'date' => '1977-7-23', 'author' => 'Sun Tzu'],
                    ['id' => 13, 'nama' => 'The Power of Habit', 'publisher' => 'Random House', 'date' => '2012-02-28', 'author' => 'Charles Duhigg'],
                    ['id' => 14, 'nama' => 'The Road to Serfdom', 'publisher' => 'University of Chicago Press', 'date' => '1944-09-18', 'author' => 'Friedrich Hayek'],
                    ['id' => 15, 'nama' => 'Astrophysics for People in a Hurry', 'publisher' => 'W. W. Norton & Company', 'date' => '2017-05-02', 'author' => 'Neil deGrasse Tyson'],
                    ['id' => 16, 'nama' => 'A Handbook of Agile Software Craftsmanship', 'publisher' => 'Prentice Hall', 'date' => '2008-08-22', 'author' => 'Robert C. Martin'],
                    ['id' => 17, 'nama' => 'Your Journey To Mastery', 'publisher' => 'Addison-Wesley', 'date' => '1999-01-01', 'author' => 'Andrew Hunt dan David Thomas'],
                    ['id' => 18, 'nama' => 'Introduction to the Theory of Computation', 'publisher' => 'Cengage Learning', 'date' => '1996-05-27', 'author' => 'Michael Sipser'],
                    ['id' => 19, 'nama' => 'C++ a simplified designners approach', 'publisher' => 'Venton Publishing', 'date' => '26-11-1967', 'author' => 'M.Thila'],
                    ['id' => 20, 'nama' => 'SAM Teach yourself CSS in 24 hours', 'publisher' => 'Indianapolis, IND;SAM', 'date' => '05-12-2007', 'author' => 'Bartlett,Kynn'],
                    ['id' => 21, 'nama' => 'You Dont Know JS (book series)', 'publisher' => 'O Reilly Media', 'date' => '2014-10-05', 'author' => 'Kyle Simpson'],
                    ['id' => 22, 'nama' => 'A Hands-On, Project-Based Introduction to Programming', 'publisher' => 'No Starch Press', 'date' => '2015-04-23', 'author' => 'Eric Matthes'],
                    ['id' => 23, 'nama' => 'JavaScript: The Good Parts', 'publisher' => 'Addison-Wesley', 'date' => '1968-06-08', 'author' => 'Donald E.Knuth'],
                    ['id' => 24, 'nama' => 'Head First Design Patterns', 'publisher' => 'O Reilly Media', 'date' => '2004-07-12', 'author' => 'Eric Freeman dan Bert Bates'],
                    ['id' => 25, 'nama' => 'Code Complete(2nd Edition)', 'publisher' => 'Microsoft Press', 'date' => '2004-06-19 ', 'author' => 'Steve McConnell'],
                    ['id' => 26, 'nama' => 'Operating System Concepts', 'publisher' => 'Morgan Kaufmann', 'date' => '2017-10-28', 'author' => 'Abraham Silberschatz, Greg Gagne & Peter B. Galvin'],
                    ['id' => 27, 'nama' => 'Artificial Intelligence: A Modern Approach (4th Edition)', 'publisher' => ' Pearson', 'date' => '2020-04-28', 'author' => 'Stuart Russell, Peter Norvig'],
                    ['id' => 28, 'nama' => 'From Journeyman to Master', 'publisher' => 'Addison-Wesley Professional ', 'date' => '1999-10-30', 'author' => ' Andrew Hunt, David Thomas'],
                    ['id' => 29, 'nama' => 'Effective Java (Edisi ke-3)', 'publisher' => 'Addison-Wesley Professional', 'date' => '2017-12-24', 'author' => 'Joshua Bloch'],
                    ['id' => 30, 'nama' => 'Network Security Essentials: Applications and Standards', 'publisher' => 'Pearson', 'date' => '2017-01-24', 'author' => 'William Stallings'],
                ];

                // Papar data buku
                foreach ($books as $book) {
                    echo "<tr>";
                    echo "<td>{$book['id']}</td>";
                    echo "<td>{$book['nama']}</td>";
                    echo "<td>{$book['publisher']}</td>";
                    echo "<td>{$book['date']}</td>";
                    echo "<td>{$book['author']}</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>

 <!-- Button to go back to the dashboard -->
 <a href="index.php" class="back-btn">Kembali ke Dashboard</a>
 <a href="daftar_buku.php" class="back-btn">Daftar Buku</a>
 

</body>
<br>
</html>
