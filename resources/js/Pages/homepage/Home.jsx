import { FilePond, registerPlugin } from 'react-filepond';
import axios from 'axios';
import 'filepond/dist/filepond.min.css';


import Style from './style.module.css';
import { useEffect, useState } from 'react';



const Home = ()=>{

    const [files, setFiles] = useState([]);
    const [categories, setCategories] = useState([]);
    const [tags, setTags] = useState([])   ; 
    const [formValues, setFormValues] = useState({});

    const [loading, setLoading] = useState(true);


// METHODS 

    const handleSubmit = (e)=>{
        e.preventDefault();

        // Send to post request
        // axios.post(base + "products", {
            
        // })
        // console.log(files);

        console.log(formValues);
    }

    const handleChange = e => {
        setFormValues({ ...formValues, [e.target.id]: e.target.value });
    }

    const handleProcessFiles = (error, file) =>{
        if(error){
            console.log(error);
            return
        }
        setFiles([...files, {
            file_id : file.serverId 
        }])
    }
    const handleRemoveFile = (file)=>{
        setFiles(files.filter(f => f.file_id !== file.serverId))
    }


    const base = "http://127.0.0.1:8000/api/"
    // Categories REST endpoint
    const categoriesURL = 
        base+'categories';
    
    const tagsURL =
        base+'tags'

    const CSRF__TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // Get categories request 
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
   

    const imageEndPoint  = "http://127.0.0.1:8000/api/image/"
    const server =  {
        process: imageEndPoint+'process',
        revert : imageEndPoint+"revert",
    }

    if(loading){
        return <h1>Data are loading ! </h1>
    }else{
        return (
            <>
                <h3>Test of filepond react.js</h3>


                <form onSubmit={(e)=>handleSubmit(e)}>
                    <input type="text" onChange={handleChange}  name="name" id="name" placeholder='Enter product name' /> <br />
                    <input type="text" onChange={handleChange} name="short_desc" id="shor_desc" placeholder='Enter short description' /><br />
                    <input type="text" onChange={handleChange} name="long_desc" id="long_desc" placeholder='Enter Product description' /><br />
                    <input type="text" onChange={handleChange} name="price" id="price" placeholder='Enter Product price' />
                    <h3>Ajouter categorie</h3>
                    {categories.map(category => {
                        return (
                            <>
                                <input type='checkbox' name='categories[]' id={category.id} value={category.id} />
                                <label htmlFor={category.id }>{category.name}</label>
                            </>
                        )
                    })}

                    <h3>Ajouter tag</h3>

                    {tags.map(tag => {
                        return (
                            <>
                                <input type='checkbox' name='tags[]' id={tag.id} value={tag.id} />
                                <label htmlFor={tag.id }>{tag.name}</label>
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
                        name='gallery[]'
                    /> 
    
                    <input type="submit" value="Submit" />
                </form>
            </>
        )
    }
}

export default Home;