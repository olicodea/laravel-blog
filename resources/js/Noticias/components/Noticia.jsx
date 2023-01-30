import Card from "@material-ui/core/Card";
import CardActions from "@material-ui/core/CardActions";
import CardContent from "@material-ui/core/CardContent";
import CardMedia from "@material-ui/core/CardMedia";
import Link from "@material-ui/core/Link";
import Typography from "@material-ui/core/Typography";
import Grid from "@material-ui/core/Grid";

const Noticia = ({ noticia }) => {
    const { urlToImage, url, title, description, source } = noticia;

    return (
        <Grid item md={6} lg={4}>
            <Card>
                {urlToImage && (
                    <CardMedia
                        component="img"
                        alt={`Imagen de la noticia ${title}`}
                        image={urlToImage}
                        height="250"
                    />
                )}
                <CardContent>
                    <Typography variant="body1" color="secondary">
                        {source.name}
                    </Typography>
                    <Typography variant="h5" component="div">
                        {title}
                    </Typography>
                    <Typography variant="body2">{description}</Typography>
                </CardContent>
                <CardActions>
                    <Link
                        href={url}
                        target="_blank"
                        variant="button"
                        color="primary"
                        className="w-100"
                        align="center"
                        sx={{
                            textDecoration: "none",
                        }}
                    >
                        Leer noticia
                    </Link>
                </CardActions>
            </Card>
        </Grid>
    );
};

export default Noticia;
