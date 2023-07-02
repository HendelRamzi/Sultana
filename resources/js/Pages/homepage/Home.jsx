import { FilePond, registerPlugin } from 'react-filepond';
import axios from 'axios';
import 'filepond/dist/filepond.min.css';



import Style from './style.module.css';
import { useEffect, useState } from 'react';
import { useForm, } from "react-hook-form"


const Home = ()=>{
    const CSRF__TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const base = "http://127.0.0.1:8000/api/"

    const [files, setFiles] = useState([]);
    const [categories, setCategories] = useState([]);
    const [tags, setTags] = useState([])   ; 

    const [loading, setLoading] = useState(true);
    const { register, handleSubmit} = useForm()


    const storeApi_URL = base + "products"
    const categoriesURL = base+'categories'   
    const tagsURL = base+'tags'
    const imageEndPoint  = base+"image/"
    
    const server =  {
        process: imageEndPoint+'process',
        revert : imageEndPoint+"revert",
    }



// METHODS 

    const handleProcessFiles = (error, file) =>{
        if(error){
            console.log(error);
            return
        }
        setFiles([...files,
           file.serverId 
        ])
    }
    const handleRemoveFile = (file)=>{
        setFiles(files.filter(f => f.file_id !== file.serverId))
    }

    const submitForm = (data) =>{
        axios.post(storeApi_URL, {
            "name" : data.name, 
            "qty" : data.qty, 
            "short_desc" : data.short_desc,
            "long_desc" : data.long_desc,
            "price" : data.price,
            "tags" : data.tags,
            "categories" : data.categories,
            "images" : files
        },{
            headers : {
                'X-CSRF-TOKEN': CSRF__TOKEN
            },
        }).then(response => {
            console.log(response)
        }).catch(error =>{
            console.log(error)
        })
    }



    // Get categories And tags request 
    const categoriesFetch = axios.get(categoriesURL)
    const tagsFetch = axios.get(tagsURL)

    // Get the list of categories
    useEffect(()=>{
        // Send the REST request
        axios.all([categoriesFetch, tagsFetch])
            .then(axios.spread((...responses) =>{
                setCategories(responses[0].data.data);
                setTags(responses[1].data.data); 

                // Finish the loading 
                setLoading(false); 
            })).catch(error => {
                console.log(error)
            })
    }, [])
   



    if(loading){
        return <h1>Data are loading ! </h1>
    }else{
        return (
            <>
                <h3>Test of filepond react.js</h3>


                <form onSubmit={handleSubmit(submitForm)}>
                    <input type="text" {...register("name")} id="name" placeholder='Enter product name' /> <br />
                    <input type="text" {...register("qty")} id="qty" placeholder='Enter product quantity' /> <br />
                    <input type="text"  {...register('short_desc')} id="shor_desc" placeholder='Enter short description' /><br />
                    <input type="text"  {...register('long_desc')} id="long_desc" placeholder='Enter Product description' /><br />
                    <input type="text"  {...register('price')} id="price" placeholder='Enter Product price' />
                    <h3>Ajouter categorie</h3>
                    {categories.map(category => {
                        return (
                            <>
                                <input type='checkbox' {...register('categories')} id={"category_"+category.id} value={category.id}/>
                                <label htmlFor={"category_"+category.id}>{category.name}</label>
                            </>
                        )
                    })}

                    <h3>Ajouter tag</h3>

                    {tags.map(tag => {
                        return (
                            <>
                                <input type='checkbox' {...register('tags')} id={"tag_"+tag.id} value={tag.id} />
                                <label htmlFor={"tag_"+tag.id}>{tag.name}</label>
                            </>
                        )
                    })}
                    
                    <FilePond 
                        allowMultiple={true} 
                        onprocessfile = {(error, file) => handleProcessFiles(error, file)}
                        onprocessfilerevert = {(file) => handleRemoveFile(file)}
                        maxFiles={3} 
                        server={server} 
                        required={true}
                        credits = {false}
                        name={"gallery"}
                    /> 
    
                    <input type="submit" value="Submit" />
                </form>
            </>
        )
    }
}

export default Home;