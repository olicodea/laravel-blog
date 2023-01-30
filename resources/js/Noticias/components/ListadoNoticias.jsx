import { Box, Grid, Typography } from "@material-ui/core";
import useNoticias from "../hooks/useNoticias";
import Noticia from "./Noticia";
import { makeStyles } from "@material-ui/core/styles";
import Pagination from "@material-ui/lab/Pagination";

const useStyles = makeStyles((theme) => ({
    root: {
        "& > *": {
            marginTop: 20,
            marginBottom: 30,
            display: "flex",
            flexDirection: "row",
            justifyContent: "center",
            alignItems: "center",
        },
    },
}));

const ListadoNoticias = () => {
    const { noticias, totalNoticias, handleChangePagina, pagina } =
        useNoticias();
    const totalPaginas = Math.ceil(totalNoticias / 20);

    const classes = useStyles();
    return (
        <>
            <Typography
                align="center"
                variant="h3"
                component={"h2"}
                className="mt-3 mb-4"
            >
                Últimas noticias
            </Typography>

            <Grid container spacing={3}>
                {noticias.map((noticia) => (
                    <Noticia
                        key={
                            noticia.urlToImage
                                ? noticia.urlToImage
                                : Math.random()
                        }
                        noticia={noticia}
                    />
                ))}
            </Grid>

            <div className={classes.root}>
                <Pagination
                    count={totalPaginas}
                    color="primary"
                    onChange={handleChangePagina}
                    page={pagina}
                />
            </div>
        </>
    );
};

export default ListadoNoticias;
