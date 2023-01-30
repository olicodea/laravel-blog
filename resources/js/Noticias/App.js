import { Container, Grid } from "@material-ui/core";
import Formulario from "./components/Formulario";
import ListadoNoticias from "./components/ListadoNoticias";
import { NoticiasProvider } from "./context/NoticiasProvider";

const App = () => {
    return (
        <NoticiasProvider>
            <Container>
                <Grid container direction="row" justifyContent="center">
                    <Grid item xs={12} md={6}>
                        <Formulario />
                    </Grid>
                </Grid>
                <ListadoNoticias />
            </Container>
        </NoticiasProvider>
    );
};

export default App;
