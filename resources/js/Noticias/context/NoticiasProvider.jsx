import axios from "axios";
import { createContext, useEffect, useState } from "react";

const NoticiasContext = createContext();

const NoticiasProvider = ({ children }) => {
    const [categoria, setCategoria] = useState("general");
    const [noticias, setNoticias] = useState([]);
    const [pagina, setpagina] = useState(1);
    const [totalNoticias, setTotalNoticias] = useState(0);

    const handleChangePagina = (e, valor) => {
        setpagina(valor);
    };

    const handleChangeCategoria = (e) => {
        setCategoria(e.target.value);
    };

    useEffect(() => {
        const consultarAPI = async () => {
            const url = `https://newsapi.org/v2/top-headlines?country=us&category=${categoria}&apiKey=${process.env.MIX_NOTICIAS_API_KEY}`;
            const { data } = await axios(url);
            setNoticias(data.articles);
            setTotalNoticias(data.totalResults);
            setpagina(1)
        };
        consultarAPI();
    }, [categoria]);

    useEffect(() => {
        const consultarAPI = async () => {
            const url = `https://newsapi.org/v2/top-headlines?country=us&page=${pagina}&category=${categoria}&apiKey=${process.env.MIX_NOTICIAS_API_KEY}`;
            const { data } = await axios(url);
            setNoticias(data.articles);
            setTotalNoticias(data.totalResults);
        };
        consultarAPI();
    }, [pagina]);

    return (
        <NoticiasContext.Provider
            value={{
                categoria,
                handleChangeCategoria,
                noticias,
                totalNoticias,
                handleChangePagina,
                pagina,
            }}
        >
            {children}
        </NoticiasContext.Provider>
    );
};

export { NoticiasProvider };

export default NoticiasContext;
