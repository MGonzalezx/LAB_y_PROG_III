/*
const obj = new Object();
const obj1 = {};
const obj2 = new Object("cadena");
const obj3 = new Object(30);
const obj4 = new Object(true);
const obj5 = new Object([]);


console.log(obj);
console.log(obj1);
console.log(obj2);
console.log(obj3);
console.log(obj4);
console.log(obj5);
*/
/*
var x;

//Objeto literal
const persona = {
    nombre: {
        pila: "Jose",
        apellido: "Perez",
    },
       
    edad: 30,
    sexo: "Masculino",
    deportes:["Tenis","Futbol","Golf"],
    hambre: true,
    saludar: function(){
        console.log("Hola");
        x = this;
    },
     presentarse(){
        console.log(`Hola, me llamo ${this.nombre.pila} y tengo ${this.edad} años`);
     },
};

console.log(persona);

console.log(persona.nombre.pila); //Jose
console.log(persona["nombre"]["pila"]); //Jose

//pudimos crear una nueva propiedad con el operador . por fuera del objeto literal.
persona.email = "jose@gmail.com";


//creamos en tiempo de ejecución una propiedad con datos que nosotros queremos y no algo literal como al anterior caso

//let nuevaPropiedad = prompt("Ingrese propiedad: ");

//let nuevoValor = prompt("Ingrese valor: ");

//persona[nuevaPropiedad] = nuevoValor;

//console.log(persona.nombre[1]); //Jose

//console.log(persona["nombre"][1]); //Jose

persona.presentarse();


const persona2 = {
    nombre: {
        pila: "Lucia",
        apellido: "Garcia",
    },
       
    edad: 24,
    sexo: "Femenino",
    deportes:["Yoga","Zumba","Netflix"],
    hambre: true,
    saludar: function(){
        console.log("Hola");
        x = this;
    },
     presentarse(){
        console.log(`Hola, me llamo ${this.nombre.pila} y tengo ${this.edad} años`);
     },
};

console.log(persona2);
console.log(persona);*/

///////////////////////////////////////////////////////////

//Objeto con constructor
/*function createPersona(nombre, edad){

    //llenamos datos on the fly
    const obj = {};
    obj.nombre = nombre;
    obj.edad = edad; 
    obj.saludar = function(){
        console.log("Hola que tal");
    }
    return obj;
}

const persona = createPersona("Juan",34);
const persona2 = createPersona("Ana",23);


console.log(persona);
console.log(persona2);*/

///////////////////////////////////////////////////////////

function Persona(nombre, edad){
    let _sexo;

    this.nombre = nombre;
    this.edad = edad;

    //setter
    this.setSexo = function(value){
        _sexo = value.toLowerCase();
    }

    //getter
    this.getSexo = function(){
        return _sexo;
    }
    
   
}

//Meto esos metodos en el objeto prototype de la Persona
Persona.prototype.saludar =  function(){
    console.log("Hola que tal");
};

Persona.prototype.presentarse = function(){
    console.log(`Hola, me llamo ${this.nombre} y tengo ${this.edad} años`);
}

const per = new Persona("Juan",34);
const per2 = new Persona("Laura",24);
per.setSexo("Masculino");

console.log(per);
console.log(per2);



per.presentarse();
per2.presentarse();