

<h1>
    <?= "Busqueda De Resultados" ?>
    
</h1>

    <input type="number"
    placeholder="Ingrese su numero de documento p">
    <button>Listo</button>

<style>
    :root{
        background-color: black;
    }

    body{
        display: grid;
        place-content: center;
    }

    h1{
        color: white;
        padding-top: 10px;
        display: block;
        margin: 10px auto -10;
    }




    input{
    width: 105%;
    max-width: 400px; 
    background: rgb(221, 212, 212);
    border: 2px solid rgba(255, 255, 255, .2);
    border-radius: 40px;
    font-size: 16px;
    color: black;
    text-align: center; 
    display: flex;
    align-items: center;
    justify-content: center;
    height: 40px;
    margin: 40px 0;
    margin-bottom: 10px;
    &::placeholder{
        color: black;
    }

    }




    button{
    width: 200px;
    height: 35px;
    background: whitesmoke;
    border: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    cursor: pointer;
    font-size: 16px;
    color: black;
    font-weight: 700;
    transition: all ease 0.5s;
    margin-top: 70px;
    display: block;
    margin: 10px auto 0;
    margin-bottom: 10px;
    margin-left: 75px;
    &:hover {
        background: #c9c6c6;
        color: rgb(0, 0, 0);
  }
}
    
</style>