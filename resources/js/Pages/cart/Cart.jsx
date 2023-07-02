import axios from 'axios'
import React, { useEffect, useState } from 'react'
import { useForm, } from "react-hook-form"

export default function Cart() {
    const CSRF__TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    
    const [products, setProducts] = useState([]); 
    const { register, handleSubmit} = useForm()
    const { register: register2, handleSubmit: handleSubmit2} = useForm();
    const { register: register3, handleSubmit: handleSubmit3} = useForm();
    
    
    
    useEffect(()=>{
      getProducts()
    }, []); 



    const getProducts = ()=>{
      var x = []

      axios.get("http://127.0.0.1:8000/cart",{
        withCredentials: true
      })
        .then(response => {
          Object.entries(response.data.data).forEach( product => {
            x = [...x, product[1]]  
          });
          setProducts([...products , ...x])
        }).catch(error =>{
          console.log(error)
      })
    }
    const CreateItemSubmit = (data) => {
        // Send the request
        axios.post("http://127.0.0.1:8000/cart", {
            data
        }, {
          headers : {
              'X-CSRF-TOKEN': CSRF__TOKEN
          },
        }).then(response => {
            getProducts()
        })
    }
    const deleteItemSubmit = (data) => {
      axios.delete("http://127.0.0.1:8000/cart/"+ data.item, {
        headers : {
            'X-CSRF-TOKEN': CSRF__TOKEN
        },
      }).then(response => {
        console.log(response.data)
          // getProducts()
      })
    }

    const updateItemSubmit = (data) =>{
      axios.put("http://127.0.0.1:8000/cart/"+ data.item, {
        data
      }, {
        headers : {
            'X-CSRF-TOKEN': CSRF__TOKEN
        },
      }).then(response =>{
        console.log(response)
      }).catch(error =>{
        console.log(error)
      })
    }



  return (
    <>
      <h2>products list</h2>
      
      {
        products.length <= 0 
        ?<p>Pas de produits pour le moment</p> 
        : <ul>{
          products.map(product => {
              return (
                <>
                  <li key={product.item_id}>{product.name}</li>
                  <form key={"delete_" + product.item_id} onSubmit={handleSubmit2(deleteItemSubmit)}>
                    <input type="hidden" {...register2('item')} value={product.item_id} />
                    <input type="submit" />
                  </form>
                  <h2>Update item</h2>
                  <form key={"update_" + product.item_id} onSubmit={handleSubmit3(updateItemSubmit)}>
                    <input type="hidden" {...register3('item')} value={product.item_id} />
                    <input type='text'  placeholder='Enter the name' {...register3("name",{ required: true })} /> <br />
                    <input type='text'  placeholder='Enter the quantity' {...register3("qty", { required: true })} /> <br />
                    <input type='text'  placeholder='Enter the price' {...register3("price", { required: true })} /> <br />
                    <input type='text'  placeholder='Enter the weight' {...register3("weight", { required: true })} />
                    <input type="submit" />
                  </form>
                </>
              )
            })}
          </ul>
      }


      <h1>Create new product</h1>
      <form onSubmit={handleSubmit(CreateItemSubmit)}>
          <input type='text' placeholder='Enter the name' {...register("name",{ required: true })} /> <br />
          <input type='text' placeholder='Enter the quantity' {...register("qty", { required: true })} /> <br />
          <input type='text' placeholder='Enter the price' {...register("price", { required: true })} /> <br />
          <input type='text' placeholder='Enter the weight' {...register("weight", { required: true })} />
          <input type="submit" />
      </form>
    </>

  )
}
