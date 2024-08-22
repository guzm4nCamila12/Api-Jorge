import express from "express";
import fs from 'fs'; //Para manipulacion de archivos FileSystem
import bodyParser from "body-parser";

const app = express();
app.use(bodyParser.json());

app.get("/",(req, res) => {
    res.send("Bienvenidos a mi api Rest en NODEJS")
})

const readData = () => {
    try{
        const data = fs.readFileSync("./db.json");
        return JSON.parse(data);
    } catch (error) {
        console.log(error);
    }
};

const writeData = (data) => {
    try {
        fs.writeFileSync("./db.json", JSON.stringify(data));
    } catch (error) {
        console.log(error);
    }
};

//Get sirve para obtener un recurso
app.get("/libros", (req, res) => {
    const data = readData();
    res.json(data)
})

//Get para un recurso especifico
app.get("/libros/:id", (req, res) => {
    const data = readData();
    const id = parseInt(req.params.id)
    const book = data.books.find((book) => book.id === id)
    res.json(book)
})

//POST sirve para agregar un recurso
app.post("/crear", (req, res) => {
    const data = readData();
    const body = req.body;
    const newBook = {
        id: data.books.length +1,
        ...body, 
    }
    data.books.push(newBook);
    writeData(data);
    res.json(newBook)
})

//PUT para actualizar
app.put("/actualizar/:id", (req, res) => {
    const data = readData();
    const id = parseInt(req.params.id)
    const body = req.body;
    const bookIndex = data.books.findIndex((book) => book.id === id)
    data.books[bookIndex] = {
        ...data.books[bookIndex],
        ...body
    }
    writeData(data);
    res.json({mensaje: "El libro se actualizó correctamente."})
})

//DELETE para eliminar
app.delete("/eliminar/:id", (req, res) => {
    const data = readData();
    const id = parseInt(req.params.id)
    const bookIndex = data.books.findIndex((book) => book.id === id)

    if(bookIndex !== -1){
        data.books.splice(bookIndex, 1);
        writeData(data)
        res.json({mensaje: "El libro se elimino correctamente."})
    }
})

app.listen(3000,() => {
    console.log("Servidor corriendo en el puerto 3000")
})